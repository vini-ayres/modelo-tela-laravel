<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = 'solicitacao';
    protected $primaryKey = 'cd_solicitacao';

    
    protected $fillable = [
        'cd_solicitacao',
        'ds_solicitacao',
        'cd_matricula_funcionario',
        'dt_emissao_solicitacao',
        'nm_servico_solicitado'
    ];

    # Mostrando o campo de data
    protected $dates = ['dt_emissao_solicitacao'];

    // Tudo poderar ser atualizado sem nenhuma restrição 
    protected $guarded = [];
    
    //  deve ser tratada como uma instância de data 
    public $timestamps = false;
    const CREATED_AT = 'dt_solicitacao';

    // Mostrando onde é a coluna de update, não pode ser excluída pois pode gerar um error
    public $updated_at = "update_at";

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'cd_matricula_funcionario', 'cd_matricula_funcionario');
    }

    public function ordem()
    {
        return $this->belongsTo(OrdemServico::class, 'cd_solicitacao', 'cd_solicitacao');
    }    
}
