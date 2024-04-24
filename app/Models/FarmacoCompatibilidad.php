<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compatibilidad;

class FarmacoCompatibilidad extends Model
{
    use HasFactory;

    protected $fillable = ['first_farmaco', 'second_farmaco', 'id_compatibilidad'];

    public function compatibilidad()
    {
        return $this->belongsTo(Compatibilidad::class, 'id_compatibilidad');
    }

    public function firstFarmaco()
    {
        return $this->belongsTo(Farmaco::class, 'first_farmaco', 'id');
    }

    public function secondFarmaco()
    {
        return $this->belongsTo(Farmaco::class, 'second_farmaco', 'id');
    }

}
