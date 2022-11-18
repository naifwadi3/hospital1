<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharmacy extends Model
{
    use HasFactory;
    protected $table = 'pharmacies';

    protected $fillable = ['medicament_name','quantity','producing_company','made_in'
    ,'medicament_classification','production_date','expiry_date','expire'];



    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
