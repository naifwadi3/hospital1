<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nurss extends Model
{
    use HasFactory;
    protected $table = 'nurs';
    protected $fillable = ['name','doctor_id','email','nurs_phone','nurs_gender','nurs_birthday','Date_of_contract'
,'Contract_expiry_date','nurs_specialty','note','nurs_cv_file','nurs_age','password'];

public function specialty()
{
    return $this->belongsTo('App\Models\doctor_specialty', 'nurs_specialty');
}
public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}
