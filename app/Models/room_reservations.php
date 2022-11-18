<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_reservations extends Model
{
    use HasFactory;
    protected $table = 'Room_reservations';
    protected $fillable = ['Patient_id','room_id','booking_date','Exit_date','facilities_name','facilities_phone'];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
