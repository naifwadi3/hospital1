<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_specialty extends Model
{
    use HasFactory;
    protected $table = 'Specialties_doctor';
    protected $fillable = ['Specialties_name','Specialties_number'];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
