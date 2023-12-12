<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
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
        'nm_servico_solicitado'
    ];

    // Indica se deve manter os timestamps (created_at e updated_at) no modelo
    public $timestamps = true;

    // Define o nome da coluna para o timestamp de criação
    const CREATED_AT = 'dt_solicitacao';
}
