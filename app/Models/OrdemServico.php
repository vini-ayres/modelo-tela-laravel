<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordem_de_servico';
    protected $primaryKey = 'cd_ordem_servico';
    public $timestamps = false;

    protected $fillable = [
        'cd_solicitacao',
        'ds_material_utilizado_ordem_servico',
        'nm_status_ordem_servico',
        'cd_tecnico'
    ];
}
