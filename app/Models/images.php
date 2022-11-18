<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{

    // public function imageable()
    // {
    //     return $this->morphTo();
    // }

    protected $table = 'images';
    protected $fillable = ['filename','imageable_id','imageable_type'];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
