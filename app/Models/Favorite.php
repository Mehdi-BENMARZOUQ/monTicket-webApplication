<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'event_id',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'favorites', 'user_id', 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
