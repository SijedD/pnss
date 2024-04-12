<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone_number extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_phone',
        'id_subscribers'

    ];

}
