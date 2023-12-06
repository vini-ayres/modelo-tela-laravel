<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Logo.min.svg/2560px-Logo.min.svg.png" width="200">

# Documentação do Sistema de Ordem de Serviço com Laravel - IFSP Campus Cubatão

## Visão Geral

O Sistema de Ordem de Serviço (SOS) do IFSP Campus Cubatão é uma plataforma abrangente projetada para gerenciar eficientemente as solicitações de serviços dentro da instituição. Esta documentação integra a descrição geral do projeto com os requisitos e instruções específicas para a implementação usando o framework Laravel.

## Requisitos do Sistema (Laravel)

- PHP >= 7.4
- Composer
- XAMPP com Apache e MySQL

## Instalação do Projeto Laravel

1. **Clonar o Repositório:**
   ```bash
   git clone https://github.com/vini-ayres/sistema-ordem-servico.git
   cd sistema-ordem-servico
   ```

2. **Instalar Dependências do Composer:**
   ```bash
   composer install
   ```

3. **Configurar o arquivo `.env`:**

   Abra o arquivo `.laravel.env` em um editor de texto e configure as variáveis de ambiente, incluindo as informações do banco de dados, de acordo com a configuração do seu ambiente XAMPP.
      ```dotenv
      APP_URL=http://localhost
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306  # Altere para a porta do MySQL no seu ambiente XAMPP
      DB_DATABASE=sua_base_de_dados
      DB_USERNAME=seu_usuario
      DB_PASSWORD=sua_senha
      ```
      Certifique-se de ajustar `DB_PORT` para refletir a porta do MySQL no seu ambiente XAMPP.

4. **Iniciar o Servidor de Desenvolvimento:**
   ```bash
   php artisan serve
   ```

## Estrutura do Projeto Laravel

- `app/`: Contém modelos, controladores e outros elementos principais do aplicativo.
- `config/`: Configurações do aplicativo.
- `database/`: Migrations e seeders do banco de dados.
- `public/`: Arquivos acessíveis publicamente (assets, imagens, etc.).
- `resources/`: Vistas, ativos frontend e traduções.
- `routes/`: Rotas do aplicativo.
- `tests/`: Testes automatizados.

## Funcionalidades Principais

### Multi-Login:

- **Funcionários:** Podem realizar solicitações de serviços, acompanhando o status das ordens de serviço submetidas.
- **Coordenadores:** Responsáveis por intermediar as solicitações, encaminhando-as aos respectivos responsáveis pelos serviços.
- **Responsáveis:** Encarregados de gerenciar e atualizar o status das ordens de serviço designadas a eles.
- **Administrador:** Possui controle total sobre o sistema, podendo gerenciar todos os funcionários cadastrados.

### Fluxo de Solicitação:

1. Um funcionário submete uma ordem de serviço.
2. A ordem de serviço é encaminhada ao coordenador para aprovação e encaminhamento.
3. O coordenador designa a ordem de serviço ao responsável correspondente ao serviço solicitado.
4. O responsável gerencia o status da ordem de serviço, mantendo o funcionário informado sobre o andamento.

### Administração de Usuários:

- O administrador tem o poder de adicionar, editar ou excluir funcionários cadastrados no campus.
- Pode ajustar os níveis de acesso dos funcionários conforme necessário, garantindo a segurança e integridade do sistema.

### Contribuição

1. Faça um fork do projeto.
2. Crie uma branch com o nome da sua feature: `git checkout -b feature-nova`.
3. Faça commit das suas alterações: `git commit -m 'Adiciona nova feature'`.
4. Faça push para a branch: `git push origin feature-nova`.
5. Abra um pull request.
