<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    // Define o uso da Factory para criar instâncias do modelo
    use HasFactory;

    // Nome da tabela associada ao modelo no banco de dados
    protected $table = 'responsavel';

    // Nome da coluna que serve como chave primária
    protected $primaryKey = 'cd_responsavel';

    // Indica se deve manter os timestamps (created_at e updated_at) no modelo
    public $timestamps = false;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'cd_responsavel',
        'nm_tipo_servico',
        'cd_matricula_funcionario'
    ];

    // Define um relacionamento de pertencimento (belongsTo) com o modelo Funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'cd_matricula_funcionario', 'cd_matricula_funcionario');
    }
}