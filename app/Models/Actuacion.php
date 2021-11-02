<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuacion extends Model
{
    use HasFactory;
    protected $table = 'actuaciones';
    protected $fillable = [
        'titulo',
        'tipo',
        'path',
        'tipoArchivo',
        'fecha',
        'procesoId',
    ];

}
