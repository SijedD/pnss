<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'room_name_number',
        'room_type',
        'id_divisions',

    ];

    protected $table = 'rooms';

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_divisions');
    }

}
