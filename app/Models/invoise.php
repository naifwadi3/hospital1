<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoise extends Model
{
    use HasFactory;
    protected $table = 'invoises';

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany('App\Models\invoice_details', 'invoice_id');
    }

    public function discountResult()
    {
        return $this->discount_type == 'fixed' ? $this->discount_value : $this->discount_value.'%';
    }

    public function Patients()
{
    return $this->belongsTo('App\Models\Patients', 'patient_id');
}
public function user(){
    return $this->belongsTo(User::class, 'user_id');
}
}

