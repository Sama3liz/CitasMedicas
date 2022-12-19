<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::patients()->paginate(10);
        return view('patients.index',compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
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
            'name.required' => 'The name of patient is required.',
            'name.min' => 'The name length must be min 3 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'identification.required' => 'The identification is required.',
            'identification.min' => 'The identification length must be min 10 digits.',
            'address.min' => 'The address length must be min 6 characters.',
            'phone.required' => 'The phone is required.',
        ];
        $this->validate($request,$rules,$messages);
        User::create(
            $request->only('name','email','identification','address','phone')
            + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'The patient was successfully created.';
        return redirect('/patients')->with(compact('notification'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
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
            'name.required' => 'The name of patient is required.',
            'name.min' => 'The name length must be min 3 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'identification.required' => 'The identification is required.',
            'identification.min' => 'The identification length must be min 10 digits.',
            'address.min' => 'The address length must be min 6 characters.',
            'phone.required' => 'The phone is required.',
        ];
        $this->validate($request,$rules,$messages);
        $user = User::patients()->findOrFail($id);
        $data = $request->only('name','email','identification','address','phone');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();
        $notification = 'The patient was successfully updated.';
        return redirect('/patients')->with(compact('notification'));
    }

    public function destroy($id)
    {
        $user = User::patients()->findOrFail($id);
        $name = $user->name;
        $user->delete();
        $notification = "The patient $name was successfully deleted.";
        return redirect('/patients')->with(compact('notification'));
    }
}
