<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistory extends Model
{
    use HasFactory;

    public function done_by (){
        return $this->belongsTo(User::class);
    }

    public function for_patient (){
        return $this->belongsTo(User::class);
    }

    public function at_specialty (){
        return $this->belongsTo(Specialty::class);
    }

}
