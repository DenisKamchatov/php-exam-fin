<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingDescription extends Model
{
    use HasFactory;
    protected $table = 'thing_description';

    public function things()
    {
        return $this->hasMany(Thing::class);
    }
}
