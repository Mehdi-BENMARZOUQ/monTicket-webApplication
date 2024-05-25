<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category_id', 'venue','location',   'start_datetime',
        'end_datetime', 'image', 'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    /*public function event()
    {
        return $this->belongsTo(Event::class);
    }*/
    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'event_id', 'user_id');
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
