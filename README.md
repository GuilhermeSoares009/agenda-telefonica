# Projeto Vue.js com Laravel

Este projeto é uma aplicação frontend desenvolvida com Vue.js, Vue Router, Vuex, TailwindCSS e Heroicons. Ele utiliza Vite como empacotador de módulos e Axios para requisições HTTP. A aplicação interage com uma API backend desenvolvida em Laravel.

## Requisitos

- Node.js (versão 14 ou superior)
- npm ou yarn
- PHP (versão 7.4 ou superior)
- Composer

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/GuilhermeSoares009/agenda-telefonica
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd agenda-telefonica
    ```

### Frontend

3. Instale as dependências do frontend:

    ```bash
    npm install
    # ou
    yarn install
    ```

### Backend

4. Navegue até o diretório do backend (Laravel):

    ```bash
    cd backend
    ```

5. Instale as dependências do Laravel:

    ```bash
    composer install
    ```

6. Crie um arquivo `.env` na raiz do projeto Laravel e configure suas variáveis de ambiente conforme necessário. Exemplo:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=agenda_telefonica
    DB_USERNAME=root
    DB_PASSWORD=sua_senha_bd
    ```

7. Gere a chave da aplicação Laravel:

    ```bash
    php artisan key:generate
    ```

8. Execute as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

## Uso

1. Inicie o servidor de desenvolvimento frontend:

    ```bash
    npm run dev
    # ou
    yarn dev
    ```

    Em outra aba do terminal, inicie o servidor Laravel:

    ```bash
    php artisan serve
    ```

2. Acesse a aplicação no navegador:

    ```bash
    http://localhost:3000
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

- `src/`: Contém os arquivos fonte do projeto.
  - `components/`: Componentes Vue.js.
  - `views/`: Páginas da aplicação.
  - `store/`: Arquivos Vuex para gerenciamento de estado.
  - `router/`: Configuração de rotas da aplicação.
  - `assets/`: Arquivos estáticos como imagens e estilos.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

## Licença

Este projeto está licenciado sob a licença MIT.
