<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_details extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';

    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function invoice()
    {
        return $this->belongsTo(invoise::class, 'invoice_id', 'id');
    }
    public function fee()
    {
        return $this->belongsTo(fee::class, 'product_name');
    }

    public function unitText()
    {
        if ($this->unit == 'piece') {
            $text = __('Frontend/frontend.piece');
        } elseif ($this->unit == 'g') {
            $text = __('Frontend/frontend.gram');
        } elseif ($this->unit == 'kg') {
            $text = __('Frontend/frontend.kilo_gram');
        }

    }
}
