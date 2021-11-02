<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcuradorProceso extends Model
{
    use HasFactory;
    protected $table = 'procurador_procesos';

    protected $fillable = [
        'tipo',
        'procesoId',
        'userId',
    ];
}
