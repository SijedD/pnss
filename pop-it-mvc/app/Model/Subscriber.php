<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_birth',
        'Id_divisions'
    ];

    public function phoneNumber()
    {
        return $this->hasMany(Phone_number::class, 'id_subscribers', 'id');
    }


//
    public function room()
    {
        return $this->belongsTo(Room::class, 'id_rooms');
    }

    public function phones()
    {
        return $this->hasManyThrough(Phone::class, Phone_number::class, 'id_subscribers', 'id', 'id', 'id_phone');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_divisions');
    }
}
