<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    public $incrementing = false;
    protected $primaryKey = 'cd_matricula_funcionario';
    public $timestamps = false;

    protected $fillable = [
        'cd_matricula_funcionario',
        'cd_nivel_acesso_funcionario',
        'nm_funcionario',
        'nm_email_institucional_funcionario',
        'nm_cargo_funcionario',
        'nm_senha_funcionario'
    ];

    public function getNivelAcessoNome()
    {
        $niveis_acesso = [
            0 => 'Funcionário',
            1 => 'Técnico',
            2 => 'Coordenador',
            3 => 'Administrador'
        ];

        return 
            $niveis_acesso[$this->cd_nivel_acesso_funcionario];
    }
}