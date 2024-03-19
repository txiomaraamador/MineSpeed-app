<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVehicle extends Model
{
    protected $table = 'typevehicles'; // Especifica el nombre de la tabla en la base de datos
    protected $fillable = ['make']; // Campos que permiten asignación masiva
}
