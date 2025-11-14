# Agendamentos Multi-Loja

Este projeto é um sistema de agendamentos multi-loja que permite que lojas, salões, barbearias e clínicas gerenciem seus serviços e agendamentos de forma eficiente. O sistema oferece uma interface personalizada para cada loja, permitindo que os proprietários configurem suas páginas e gerenciem suas operações.

## Funcionalidades

- **Cadastro de Lojas**: Permite que novas lojas se cadastrem e criem suas páginas personalizadas.
- **Gerenciamento de Serviços**: Cada loja pode adicionar, editar e excluir serviços oferecidos.
- **Agendamentos**: Clientes podem agendar serviços, que são gerenciados pelos recepcionistas.
- **Painel Administrativo**: Um painel para administradores gerencia todas as lojas e visualiza relatórios.
- **Notificações**: Sistema de notificações via e-mail e WhatsApp para agendamentos.

## Estrutura do Projeto

- **public/**: Contém os arquivos acessíveis publicamente, como o ponto de entrada da aplicação (`index.php`), arquivos CSS e JavaScript.
- **src/**: Contém a lógica da aplicação, incluindo controladores, modelos, serviços e helpers.
- **config/**: Contém as configurações do banco de dados.
- **migrations/**: Diretório para arquivos de migração do banco de dados.
- **sql/**: Contém o esquema do banco de dados.
- **tests/**: Contém testes unitários para a aplicação.
- **composer.json**: Arquivo de configuração do Composer.
- **.env.example**: Exemplo de arquivo de configuração de variáveis de ambiente.
- **.gitignore**: Arquivo que lista os arquivos e diretórios a serem ignorados pelo Git.

## Instalação

1. Clone o repositório:
   ```
   git clone <URL_DO_REPOSITORIO>
   ```
2. Navegue até o diretório do projeto:
   ```
   cd agendamentos-multilojas
   ```
3. Instale as dependências do Composer:
   ```
   composer install
   ```
4. Configure o arquivo `.env` com suas credenciais de banco de dados.
5. Execute as migrações para criar as tabelas no banco de dados:
   ```
   php artisan migrate
   ```
6. Inicie o servidor local:
   ```
   php -S localhost:8000 -t public
   ```

## Uso

Acesse o sistema através do navegador em `http://localhost:8000`. Siga as instruções na interface para cadastrar lojas, serviços e gerenciar agendamentos.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou pull requests.

## Licença

Este projeto está licenciado sob a MIT License. Veja o arquivo LICENSE para mais detalhes.