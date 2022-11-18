<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    use HasFactory;

    protected $table = 'receipts';

       protected $fillable = ['patient_id','receipt_number','reason_amount','amount_paid','remaining_amount','Date_of_receipt','note'];


       public function Patients()
   {
       return $this->belongsTo('App\Models\Patients', 'patient_id');
   }

   public function fee()
   {
       return $this->belongsTo('App\Models\fee', 'reason_amount');
   }
   public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}
