<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialty;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index',compact('doctors'));
    }

    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'identification' => 'required|min:10',
            'address' => 'required|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'The name of doctor is required.',
            'name.min' => 'The name length must be min 3 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'identification.required' => 'The identification is required.',
            'identification.min' => 'The identification length must be min 10 digits.',
            'address.min' => 'The address length must be min 6 characters.',
            'phone.required' => 'The phone is required.',
        ];
        $this->validate($request,$rules,$messages);
        $user = User::create(
            $request->only('name','email','identification','address','phone')
            + [
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $user->specialty()->attach($request->input('specialties'));
        $notification = 'The doctor was successfully created.';
        return redirect('/medics')->with(compact('notification'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $doctor = User::doctors()->findOrFail($id);
        $specialties = Specialty::all();
        $specialty_ids = $doctor->specialty()->pluck('specialties.id');
        return view('doctors.edit', compact('doctor','specialties','specialty_ids'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'identification' => 'required|min:10',
            'address' => 'required|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'The name of doctor is required.',
            'name.min' => 'The name length must be min 3 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'identification.required' => 'The identification is required.',
            'identification.min' => 'The identification length must be min 10 digits.',
            'address.min' => 'The address length must be min 6 characters.',
            'phone.required' => 'The phone is required.',
        ];
        $this->validate($request,$rules,$messages);
        $user = User::doctors()->findOrFail($id);
        $data = $request->only('name','email','identification','address','phone');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();
        $user->specialty()->sync($request->input('specialties'));
        $notification = 'The doctor was successfully updated.';
        return redirect('/medics')->with(compact('notification'));
    }

    public function destroy($id)
    {
        $user = User::doctors()->findOrFail($id);
        $name = $user->name;
        $user->delete();
        $notification = "The doctor $name was successfully deleted.";
        return redirect('/medics')->with(compact('notification'));
    }
}
