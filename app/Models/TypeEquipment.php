<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEquipment extends Model
{
    protected $table = 'typeequipments'; // Especifica el nombre de la tabla en la base de datos
    protected $fillable = ['make', 'description', 'model']; // Campos que permiten asignación masiva
}
