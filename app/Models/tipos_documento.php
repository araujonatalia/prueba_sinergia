<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipos_documento extends Model
{
    use HasFactory;
    protected $table = "tipos_documento";

    protected $fillable = [
        'id_tipo_documento',
        'nombre',
    ];
}
