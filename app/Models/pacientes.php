<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    use HasFactory;

    protected $table = "pacientes";

    protected $fillable = [
        'id_paciente',
        'fK_id_tipdocumento',
        'num_documento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
       // 'foto',
        'fK_id_genero',
        'fk_id_departamento',
        'fk_id_municipio',
    ];

    protected $primaryKey = 'id_paciente';
}
