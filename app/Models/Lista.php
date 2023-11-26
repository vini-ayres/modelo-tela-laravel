<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
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
    
    //  deve ser tratada como uma instância de data 
    public $timestamps = true;
    const CREATED_AT = 'dt_solicitacao';

    

}
