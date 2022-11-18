<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptions extends Model
{
    use HasFactory;


    protected $table = 'Reception_emergency_department';
    protected $fillable = ['patient_name','patient_id','patient_gender','patient_phone','facilities_name','facilities_phone','enter_date'
,'out_date','condition','transfer_by'];

public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}
