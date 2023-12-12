<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    // Define o uso da Factory para criar instâncias do modelo
    use HasFactory;

    // Nome da tabela associada ao modelo no banco de dados
    protected $table = 'solicitacao';

    // Nome da coluna que serve como chave primária
    protected $primaryKey = 'cd_solicitacao';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'cd_solicitacao',
        'ds_solicitacao',
        'cd_matricula_funcionario',
        'dt_emissao_solicitacao',
        'nm_servico_solicitado'
    ];

    // Mostra que 'dt_emissao_solicitacao' deve ser tratada como uma instância de data
    protected $dates = ['dt_emissao_solicitacao'];

    // Indica se deve manter os timestamps (created_at e updated_at) no modelo
    public $timestamps = false;

    // Define o nome da coluna para o timestamp de criação
    const CREATED_AT = 'dt_solicitacao';

    // Define explicitamente o nome da coluna para o timestamp de atualização
    public $updated_at = 'update_at';

    // Define um relacionamento de pertencimento (belongsTo) com o modelo Funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'cd_matricula_funcionario', 'cd_matricula_funcionario');
    }
}