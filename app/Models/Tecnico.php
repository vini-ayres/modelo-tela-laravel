<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnico';
    protected $primaryKey = 'cd_tecnico';
    public $timestamps = false;

    protected $fillable = [
        'cd_tecnico',
        'nm_tipo_servico',
        'cd_matricula_funcionario'
    ];
}
