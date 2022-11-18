<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_an_appointments extends Model
{
    use HasFactory;
    protected $table = 'book_an_appointments';

    protected $fillable = ['patient_id','doctor_id','patient_phone','booking_date'];

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
