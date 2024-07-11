# Projeto Vue.js com Laravel

Este projeto é uma aplicação frontend desenvolvida com Vue.js, Vue Router, Vuex, TailwindCSS e Heroicons. Ele utiliza Vite como empacotador de módulos e Axios para requisições HTTP. A aplicação interage com uma API backend desenvolvida em Laravel.

## Requisitos

- Node.js (versão 14 ou superior)
- npm ou yarn

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd seu-repositorio
    ```

3. Instale as dependências:

    ```bash
    npm install
    # ou
    yarn install
    ```

## Configuração

1. Crie um arquivo `.env` na raiz do projeto e configure suas variáveis de ambiente conforme necessário. Exemplo:

    ```env
    VITE_API_BASE_URL=http://127.0.0.1:8000/api
    ```

## Uso

1. Inicie o servidor de desenvolvimento:

    ```bash
    npm run dev
    # ou
    yarn dev
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
