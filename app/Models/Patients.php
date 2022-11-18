<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = ['patient_name','patient_id','email','patient_phone','patient_blood_type','patient_religion','patient_gender'
,'patient_allergy','patient_birthday','patient_arrival_time','reason_for_visit'];

public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}
