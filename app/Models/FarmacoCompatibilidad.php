<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmacoCompatibilidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_farmaco',
        'second_farmaco',
        'id_compatibilidad'
    ];
}
