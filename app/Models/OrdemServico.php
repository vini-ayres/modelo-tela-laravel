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
        'dt_entrega_ordem_servico',
        'ds_material_utilizado_ordem_servico',
        'nm_status_ordem_servico',
        'cd_responsavel'
    ];

    protected $dates = ['dt_entrega_ordem_servico'];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'cd_responsavel', 'cd_responsavel');
    }
}
