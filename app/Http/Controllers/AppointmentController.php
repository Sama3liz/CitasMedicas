<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Appointment;
use Carbon\Carbon;
use App\Interfaces\ScheduleServiceInterface;
use App\Models\CancelledAppointment;
use App\Models\ClinicalHistory;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index(){
        $role = auth()->user()->role;
        if ($role == 'admin') {
            // Admin
            $appointmentsActual = Appointment::all()
            ->whereIn('status', ['Confirmed','Reserved']);
            $appointmentsHistory = Appointment::all()
            ->whereIn('status', ['Done','Cancelled']);
            return view('appointments.index', compact('appointmentsActual','appointmentsHistory','role'));
        }elseif ($role == 'doctor') {
            // Doctor
            $appointmentsActual = Appointment::all()
                ->whereIn('status', ['Confirmed','Reserved'])
                ->where('doctor_id', auth()->id());
            $appointmentsHistory = Appointment::all()
                ->whereIn('status', ['Done','Cancelled'])
                ->where('doctor_id', auth()->id());
            return view('appointments.index', compact('appointmentsActual','appointmentsHistory','role'));
        }elseif ($role == 'patient') {
            // Patients
            $appointmentsActual = Appointment::all()
                ->whereIn('status', ['Confirmed','Reserved'])
                ->where('patient_id', auth()->id());
            $appointmentsHistory = Appointment::all()
                ->whereIn('status', ['Done','Cancelled'])
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

    public function cancel(Appointment $appointment, Request $request){
        $cancellation = new CancelledAppointment();
        $cancellation->cancelled_by_id = auth()->id();
        $appointment->cancellation()->save($cancellation);
        $appointment->status = 'Cancelled';
        $appointment->save();
        $notification = 'The appointment was successfully cancelled.';
        return redirect('/appointments')->with(compact('notification'));
    }

    public function confirm(Appointment $appointment){
        $appointment->status = 'Confirmed';
        $appointment->save();
        $notification = 'The appointment was successfully confirmed.';
        return back()->with(compact('notification'));
    }

    public function formCancel(Appointment $appointment){
        if ($appointment->status == 'Confirmed') {
            $role = auth()->user()->role;
            return view('appointments.cancel', compact('appointment','role'));
        }
        return redirect('/appointments');
    }

    public function done(Appointment $appointment, Request $request){
        if ($request->has('details')) {
            $done = new ClinicalHistory();
            $done->details = $request->input('details');
            $done->done_by_id = auth()->id();
            $done->for_patient_id = $request->input('patient_id');
            $done->at_specialty_id = $request->input('specialty_id');            
            $appointment->done()->save($done);
        }
        $appointment->status = 'Done';
        $appointment->save();
        $notification = 'The appointment was successfully done.';
        return redirect('/appointments')->with(compact('notification'));
    }

    public function formAppointment(Appointment $appointment){
        if ($appointment->status == 'Confirmed') {
            $role = auth()->user()->role;
            return view('appointments.start', compact('appointment','role'));
        }
        return redirect('/appointments');
    }

    public function show(Appointment $appointment){
        $role = auth()->user()->role;
        $historyId = $appointment->id;
        $history = ClinicalHistory::where('appointment_id', '=', $historyId)->first();
        return view('appointments.show',compact('appointment','role','history'));
    }

    public function invoice(Appointment $appointment){
        return view('appointments.invoice',compact('appointment'));
    }
}
