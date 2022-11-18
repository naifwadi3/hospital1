<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rays extends Model
{
    use HasFactory;
    protected $table = 'rays';
    protected $fillable = ['patient_id','device_name','booking_date'];


    public function patient()
{
    return $this->belongsTo('App\Models\Patients', 'patient_id');
}
public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}
