<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients_medicine extends Model
{
    use HasFactory;
    protected $table = 'patients_medicines';

    protected $fillable = ['patient_id','doctor_id','medicament_name','discharge_date','quantity','use_way'];

    public function doctors()
    {
        return $this->belongsTo('App\Models\doctors', 'doctor_id');
    }

        public function Patients()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id');
    }

    public function pharmci()
    {
        return $this->belongsTo('App\Models\pharmacy', 'medicament_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
