<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'ticket_name',
        'code',
        'percentage',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
