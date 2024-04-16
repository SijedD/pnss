<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type_division'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

}
