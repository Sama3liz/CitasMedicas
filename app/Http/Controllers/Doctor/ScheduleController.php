<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedules;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    private $days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];

    public function edit(){
        $schedules = Schedules::where('user_id', auth()->id())->get();
        if(count($schedules) > 0){
            $schedules->map(function($schedules){
                $schedules->morning_start = (new Carbon($schedules->morning_start))->format('g:i A');
                $schedules->morning_end = (new Carbon($schedules->morning_end))->format('g:i A');
                $schedules->afternoon_start = (new Carbon($schedules->afternoon_start))->format('g:i A');
                $schedules->afternoon_end = (new Carbon($schedules->afternoon_end))->format('g:i A');
            });
        }else {
            $schedules = collect();
            for ($i=0; $i < 7; $i++) { 
                $schedules->push(new Schedules());
            }
        }
        
        $days = $this->days;
        return view('schedule', compact('days','schedules'));
    }

    public function store(Request $request){
        $active = $request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');
        $errors = [];
        for ($i=0; $i < 7; $i++) { 
            if($morning_start[$i] > $morning_end[$i]){
                $errors[] = 'The day shift interval is wrong on '. $this->days[$i] .'.';
            }
            if($afternoon_start[$i] > $afternoon_end[$i]){
                $errors[] = 'The afternoon shift interval is wrong on '. $this->days[$i] .'.';
            }
            Schedules::updateOrCreate(
                [
                    'day' => $i,
                    'user_id' => auth()->id()
                ],
                [
                    'active' => in_array($i,$active),
                    'morning_start' => $morning_start[$i],
                    'morning_end' => $morning_end[$i],
                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i]
                ]
            );
        }
        if (count($errors) > 0) {
            return back()->with(compact('errors'));
        }
        $notification = 'The changes was successfully saved.';
        return back()->with(compact('notification'));
    }
}
