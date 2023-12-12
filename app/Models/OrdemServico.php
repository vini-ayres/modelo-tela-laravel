<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    // Define o uso da Factory para criar instâncias do modelo
    use HasFactory;

    // Nome da tabela associada ao modelo no banco de dados
    protected $table = 'ordem_de_servico';

    // Nome da coluna que serve como chave primária
    protected $primaryKey = 'cd_ordem_servico';

    // Indica se deve manter os timestamps (created_at e updated_at) no modelo
    public $timestamps = false;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'cd_solicitacao',
        'dt_entrega_ordem_servico',
        'ds_material_utilizado_ordem_servico',
        'nm_status_ordem_servico',
        'cd_responsavel'
    ];

    // Especifica que 'dt_entrega_ordem_servico' deve ser tratada como uma instância de data
    protected $dates = ['dt_entrega_ordem_servico'];

    // Define um relacionamento de pertencimento (belongsTo) com o modelo Tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'cd_responsavel', 'cd_responsavel');
    }
}