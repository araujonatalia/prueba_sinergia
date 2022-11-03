<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
    use HasFactory;
    protected $table = "municipios";

    protected $fillable = [
        'id_municipio',
        'nombre',
        'fk_id_departamento',
    ];
}
