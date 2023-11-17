<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = 'solicitacao';
    protected $primaryKey = 'cd_solicitacao';
    public $timestamps = false;

    protected $fillable = [
        'cd_solicitacao',
        'ds_solicitacao',
        'dt_entrega_solicitacao',
        'cd_matricula_funcionario',
        'nm_servico_solicitado'
    ];
}
