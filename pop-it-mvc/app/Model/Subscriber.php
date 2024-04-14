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


    public function division()
    {
        return $this->hasMany(Division::class, 'id', 'id_divisions');
    }
}
