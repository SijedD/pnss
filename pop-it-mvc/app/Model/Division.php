<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasMany(Room::class, 'id', 'id_rooms');
    }
}
