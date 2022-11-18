<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class day_work extends Model
{
    use HasFactory;
    protected $table = 'day_works';
    protected $fillable = ['worker_id','the_work','status','start_time','end_time','note'];






    public function doctors()
{
    return $this->belongsTo('App\Models\doctors', 'worker_id');
}
public function nurs()
{
    return $this->belongsTo('App\Models\nurss', 'worker_id');
}

}
