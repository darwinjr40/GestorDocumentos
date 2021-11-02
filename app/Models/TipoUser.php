<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;

class TipoUser extends Model
{
    use HasFactory;
    protected $table = 'tipos_user';
    protected $fillable = [
        'descripcion',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'user_tipo_users');
    }

}
