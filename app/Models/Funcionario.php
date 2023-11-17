<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primaryKey = 'cd_matricula_funcionario';
    public $timestamps = false;

    protected $fillable = ['cd_matricula_funcionario', 'cd_nivel_acesso_funcionario'];
}