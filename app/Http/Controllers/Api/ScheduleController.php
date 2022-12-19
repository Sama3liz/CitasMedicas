<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Interfaces\ScheduleServiceInterface;

class ScheduleController extends Controller
{
    public function hours(Request $request, ScheduleServiceInterface $scheduleServiceInterface){
        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'doctor_id' => 'required|exists:users,id'
        ];
        $this->validate($request, $rules);
        $date = $request->input('date');
        $doctorId = $request->input('doctor_id');
        return $scheduleServiceInterface->getAvailableIntervals($date,$doctorId);
    }
}
