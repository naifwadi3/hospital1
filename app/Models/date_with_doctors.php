<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class date_with_doctors extends Model
{
    use HasFactory;

 protected $table = 'date_with_doctor';

    protected $fillable = ['patient_id','doctor_id','visit_date','patient_phone'];




    public function doctors()
{
    return $this->belongsTo('App\Models\doctors', 'doctor_id');
}

    public function Patients()
{
    return $this->belongsTo('App\Models\Patients', 'patient_id');
}
public function user(){
    return $this->belongsTo(User::class, 'user_id');
}

}
