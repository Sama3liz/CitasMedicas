<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\ClinicalHistory;
use App\Models\Appointment;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }

    public function index(){
        $histories = ClinicalHistory::all()->where('done_by_id', auth()->id());
        return view('histories.index', compact('histories'));
    }

    public function show(ClinicalHistory $history){
        return view('histories.show',compact('history'));
    }
}
