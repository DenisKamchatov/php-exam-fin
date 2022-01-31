<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Using extends Model
{
    use HasFactory;
    protected $table = 'usage';

    public function things()
    {
        return $this->hasMany(Thing::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
