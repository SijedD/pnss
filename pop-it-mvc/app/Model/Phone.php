<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'phone_number',
        'id_rooms'

    ];

    protected $table = 'phones';

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_rooms');
    }

    public function phoneNumber()
    {
        return $this->belongsTo(Phone_number::class);
    }

}
