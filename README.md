# Desafio Técnico - Projeto Vue.js com Laravel

Este projeto é uma aplicação frontend desenvolvida com Vue.js, Vue Router, Vuex, TailwindCSS e Heroicons. Ele utiliza Vite como empacotador de módulos e Axios para requisições HTTP. A aplicação interage com uma API backend desenvolvida em Laravel.

## Requisitos Obrigatórios

- [x] Fazer uma agenda telefônica (em formato de lista)
- [x] Na tela específica de contato deve conter campos de telefone, nome, e-mail e imagem
- [ ] DEVE ser possível cadastrar, atualizar, visualizar e apagar contatos da agenda (CRUD)
- [x] O projeto deve ser responsivo para as medidas de desktop e mobile
- [x] A aplicação DEVE ser feita em VueJs com back em Laravel e Banco de dados do tipo SQL

## Requisitos

- Node.js (versão 20.11.0)
- npm ou yarn
- PHP (versão 8.2.12)
- Composer
- Laravel 11

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/GuilhermeSoares009/agenda-telefonica
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd agenda-telefonica
    ```

3. Instale as dependências do Node.js:

    ```bash
    npm install
    # ou
    yarn install
    ```

4. Instale as dependências do PHP com o Composer:

    ```bash
    composer install
    ```

## Configuração

1. Crie um arquivo `.env` na raiz do projeto e configure suas variáveis de ambiente conforme necessário. Exemplo:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=agenda_telefonica
    DB_USERNAME=root
    DB_PASSWORD=sua_senha_bd
    ```

2. Crie um banco de dados MySQL com o nome especificado em `DB_DATABASE` no arquivo `.env`.

## Uso

1. Inicie o servidor de desenvolvimento para o frontend:

    ```bash
    npm run dev
    # ou
    yarn dev
    ```

2. Em outra aba do terminal, inicie o servidor Laravel:

    ```bash
    php artisan serve
    ```

3. Acesse a aplicação no navegador:

    ```bash
    http://127.0.0.1:8000
    ```

## Compilação para Produção

1. Para compilar a aplicação para produção, execute:

    ```bash
    npm run build
    # ou
    yarn build
    ```

2. Os arquivos compilados estarão disponíveis no diretório `dist`.

## Estrutura do Projeto

### Front-End:

- `css/`: Arquivos CSS da aplicação (se houver).
- `js/`: Código JavaScript da aplicação.
  - `components/`: Componentes JavaScript da aplicação.
    - `Contacts/`: Componentes relacionados aos contatos (se aplicável).
    - `UI/`: Componentes de interface de usuário compartilhados.
  - `composables/`: Lógica reutilizável (composables).
  - `Pages/`: Páginas da aplicação ou controladores (se for organizado dessa forma).
  - `store/`: Configuração e gerenciamento de estado da aplicação.
- `views/`: Visualizações ou templates da aplicação.

### Backend:

- `app/`: Contém a lógica principal da aplicação.
  - `Http/`: Controladores, middlewares e rotas HTTP.
    - `Controllers/`: Controladores da API.
    - `Middleware/`: Middlewares para aplicar filtros às requisições HTTP.
    - `Requests/`: Validações de requisições.
  - `Models/`: Modelos de dados da aplicação.
- `config/`: Configurações da aplicação.
- `database/`: Arquivos relacionados ao banco de dados.
  - `migrations/`: Migrações do banco de dados.
- `public/`: Diretório público acessível pelo servidor web.
- `routes/`: Definições de rotas da API.
- `.env`: Arquivo de variáveis de ambiente.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

## Licença

Este projeto está licenciado sob a licença MIT.
