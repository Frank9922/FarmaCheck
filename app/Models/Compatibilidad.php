<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FarmacoCompatibilidad;
use App\Models\Farmaco;

class Compatibilidad extends Model
{
    use HasFactory;

    public function farmacos()
    {
        return $this->belongsToMany(Farmaco::class, 'farmaco_compatibilidads', 'id_compatibilidad', 'first_farmaco')
                    ->withPivot('second_farmaco');
    }

    public function farmacoCompatibilidads() {
        return $this->belongsToMany(FarmacoCompatibilidad::class);
    }
}
