<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    // Define o uso da Factory para criar instâncias do modelo
    use HasFactory;

    // Nome da tabela associada ao modelo no banco de dados
    protected $table = 'funcionario';

    // Indica se a chave primária não é incrementável (auto-incremento)
    public $incrementing = false;

    // Nome da coluna que serve como chave primária
    protected $primaryKey = 'cd_matricula_funcionario';

    // Indica se deve manter os timestamps (created_at e updated_at) no modelo
    public $timestamps = false;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'cd_matricula_funcionario',
        'cd_nivel_acesso_funcionario',
        'nm_funcionario',
        'nm_email_institucional_funcionario',
        'nm_cargo_funcionario',
        'nm_senha_funcionario'
    ];

    // Método para obter o nome do nível de acesso do funcionário
    public function getNivelAcessoNome()
    {
        // Mapeia os códigos de nível de acesso para seus respectivos nomes
        $niveis_acesso = [
            0 => 'Funcionário',
            1 => 'Técnico',
            2 => 'Coordenador',
            3 => 'Administrador'
        ];

        // Retorna o nome do nível de acesso com base no código associado ao funcionário
        return $niveis_acesso[$this->cd_nivel_acesso_funcionario];
    }
}
