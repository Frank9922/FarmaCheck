<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compatibilidad;
class Farmaco extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function compatibilidades()
    {
        return $this->belongsToMany(Compatibilidad::class, 'farmaco_compatibilidads', 'first_farmaco', 'id_compatibilidad')
                    ->withPivot('second_farmaco');
    }
}
