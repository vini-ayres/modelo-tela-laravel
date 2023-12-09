<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'responsavel';
    protected $primaryKey = 'cd_responsavel';
    public $timestamps = false;

    protected $fillable = [
        'cd_responsavel',
        'nm_tipo_servico',
        'cd_matricula_funcionario'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'cd_matricula_funcionario', 'cd_matricula_funcionario');
    }
}
