<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primaryKey = 'cd_matricula_funcionario';
    public $timestamps = false;

    protected $fillable = [
        'cd_matricula_funcionario',
        'cd_nivel_acesso_funcionario',
        'nm_funcionario',
        'nm_email_institucional_funcionario',
        'nm_cargo_funcionario'
    ];

    public function getNivelAcessoNome()
    {
        $niveis_acesso = [
            0 => 'Funcionário',
            1 => 'Técnico',
            2 => 'Coordenador',
            3 => 'Administrador'
            
        ];

        #$niveis_acesso_todos = implode(',', $niveis_acesso);
        # $nivel_usuario = array_shift($niveis_acesso_todos);
       #$niveis_acesso_todos = json_encode($niveis_acesso, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
       

        #$nivel_usuario = $niveis_acesso[$this->cd_nivel_acesso_funcionario];

        # $nivel_usuario = $niveis_acesso[$this->cd_nivel_acesso_funcionario];
        /*$nivel_usuario_json = json_encode($nivel_usuario, JSON_UNESCAPED_UNICODE);*/

        return 
            /*$this->hasOne(Funcionario::class, 'id', 'nivel_acesso')->select('nome'),, */
            # $niveis_acesso_todos;
            $niveis_acesso[$this->cd_nivel_acesso_funcionario];
             # $nivel_usuario;
            # $niveis_acesso
        
    }
}