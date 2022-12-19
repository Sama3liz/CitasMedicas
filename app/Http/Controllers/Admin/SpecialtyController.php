<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }

    public function index(){
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    public function send(Request $request){
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'The name of specialty is required.',
            'name.min' => 'The name length must be min 3 characters.'
        ];
        $this->validate($request,$rules,$messages);
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'The specialty was successfully created.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty){
        return view('specialties.edit',compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty){
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'The name of specialty is required.',
            'name.min' => 'The name length must be min 3 characters.'
        ];
        $this->validate($request,$rules,$messages);
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'The specialty was successfully updated.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty){
        $name = $specialty->name;
        $specialty->delete();
        $notification = 'The specialty '. $name .' was successfully deleted.';
        return redirect('/specialties')->with(compact('notification'));
    }
}
