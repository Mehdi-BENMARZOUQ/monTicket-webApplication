<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCategory extends Model
{
    use HasFactory;

    protected $fillable = ['city'];

    public function events()
    {
        return $this->hasMany(Event::class, 'location_id');
    }


}
