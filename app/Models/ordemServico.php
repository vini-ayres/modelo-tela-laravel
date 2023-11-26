<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordemServico extends Model
{
    protected $table = 'ordemservico';
    protected $fillable = [
        'cd_ordem',
        'ds_ordem',
        'cd_responsavel',
        'dt_entrega_ordem',
        'nm_servico_solicitado',
        'nm_status_ordem'	
    ];
    protected $dates = ['dt_entrega_ordem'];

    // Mostrando onde é a coluna de update, não pode ser excluída pois pode gerar um error
    public $timestamps = false;

}
