<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operating_room_reservation extends Model
{
    use HasFactory;
    protected $table = 'Operating_room_reservation';
    protected $fillable = ['patient_id','facilities_name','facilities_phone','operating_room_number','recovery_room_number','booking_date','enter_time'
,'out_time','Operation_type','doctor_of_out','doctor_id_1','doctor_id_2','doctor_id_3','doctor_id_4','nurss_name_1','nurss_name_2','nurss_name_3','nurss_name_4'];

public function Patients()
{
    return $this->belongsTo('App\Models\Patients', 'patient_id');
}

public function doctors()
{
    return $this->belongsTo('App\Models\doctors', 'doctor_id_1');
}
public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}
