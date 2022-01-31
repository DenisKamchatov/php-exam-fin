<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;
    protected $table = 'things';

    public function master()
    {
        return $this->belongsTo(User::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }

    public function description()
    {
        return $this->belongsToMany(ThingDescription::class);
    }
}
