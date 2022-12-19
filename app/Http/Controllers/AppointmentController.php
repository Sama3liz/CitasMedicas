<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Appointment;
use Carbon\Carbon;
use App\Interfaces\ScheduleServiceInterface;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index(){
        $role = auth()->user()->role;
        if ($role == 'doctor') {
            // Doctor
            $appointmentsActual = Appointment::all()
                ->whereIn('status', ['Confirmed','Reserved'])
                ->where('doctor_id', auth()->id());
            $appointmentsHistory = Appointment::all()
                ->whereIn('status', ['Done','Canceled'])
                ->where('doctor_id', auth()->id());
            return view('appointments.index', compact('appointmentsActual','appointmentsHistory','role'));
        }elseif ($role == 'paciente') {
            // Patients
            $appointmentsActual = Appointment::all()
                ->whereIn('status', ['Confirmed','Reserved'])
                ->where('patient_id', auth()->id());
            $appointmentsHistory = Appointment::all()
                ->whereIn('status', ['Done','Canceled'])
                ->where('patient_id', auth()->id());
            return view('appointments.index', compact('appointmentsActual','appointmentsHistory','role'));
        }
        
    }

    public function create(ScheduleServiceInterface $scheduleServiceInterface){
        $specialties = Specialty::all();
        $specialtyId = old('specialty_id');
        if ($specialtyId) {
            $specialty = Specialty::find($specialtyId);
            $doctors = $specialty->users;
        }else {
            $doctors = collect();
        }
        $date = old('scheduled_date');
        $doctorId = old('doctor_id');
        if ($date && $doctorId) {
            $intervals = $scheduleServiceInterface->getAvailableIntervals($date,$doctorId);
        }else {
            $intervals = null;
        }
        return view('appointments.create', compact('specialties','doctors','intervals'));
    }

    public function store(Request $request, ScheduleServiceInterface $scheduleServiceInterface){
        $rules = [
            'scheduled_time' => 'required',
            'doctor_id' => 'exists:users,id',
            'specialty_id' => 'exists:specialties,id'
        ];
        $messages = [
            'scheduled_time.required' => 'Must choose a valid hour for the appointment.'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->after(function ($validator) use ($request, $scheduleServiceInterface) {
            $date = $request->input('scheduled_date');
            $doctorId = $request->input('doctor_id');
            $scheduled_time = $request->input('scheduled_time');
            if ($date && $doctorId && $scheduled_time) {
                $start = new Carbon($scheduled_time);
            }else {
                return;
            }
            if (!$scheduleServiceInterface->isAvailableInterval($date,$doctorId, $start)) {
                $validator->errors()->add(
                    'available_time', 'The selected time has been booked!'
                );
            }
        });
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->only([
            'scheduled_date',
            'scheduled_time',
            'doctor_id',
            'patient_id',
            'specialty_id'
        ]);
        $data['patient_id'] = auth()->id();
        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');
        Appointment::create($data);
        $notification = 'The appointment was successfully booked.';
        return redirect('/appointments')->with(compact('notification'));
    }

    public function cancel(Appointment $appointment){
        $appointment->status = 'Canceled';
        $appointment->save();
        $notification = 'The appointment was successfully canceled.';
        return back()->with(compact('notification'));
    }

    public function show(Appointment $appointment){
        return view('errors.404');
    }
}
