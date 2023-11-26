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
        'dt_solicitacao',
        'ds_solicitacao',
        'dt_entrega_solicitacao',
        'cd_matricula_funcionario',
        'nm_servico_solicitado'

    ];

    # Mostrando o campo de data
    protected $dates = ['dt_solicitacao',  'dt_entrega_solicitacao'];

    // Tudo poderar ser atualizado sem nenhuma restrição 
    protected $guarded = [];
    
    //  deve ser tratada como uma instância de data 
    public $timestamps = false;
    const CREATED_AT = 'dt_solicitacao';

    // Mostrando onde é a coluna de update, não pode ser excluída pois pode gerar um error
    public $updated_at = "update_at";
    
    public function tecnico()
    {
        return $this->belongsTo(Funcionario::class, 'cd_matricula_funcionario', 'cd_matricula_funcionario');
    }
}
