<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    protected $table = 'procesos';

    public function procuradores(){
        return $this->belongsToMany(User::class, 'procurador_procesos');
    }
}
