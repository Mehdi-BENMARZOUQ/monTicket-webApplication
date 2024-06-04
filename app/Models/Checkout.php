<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'ticket_id', 'coupon_code','quantity', 'total_amount','qr_code_path'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

}
