<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #444;
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            line-height: 1.2;
            font-weight: 400;
        }
        ul {
            list-style: disc;
            padding-left: 20px;
        }
        code {
            font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
            font-size: 14px;
            color: #444;
            background-color: #f5f5f5;
            padding: 2px 4px;
        }
        pre code {
            display: block;
            padding: 10px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
<h1 align="center">API de Produtos com Laravel</h1>
<p>Este projeto é uma API de produtos construída com o framework Laravel. A API permite que você crie, leia, atualize e exclua produtos. Além disso, a API é protegida por autenticação JWT, o que significa que você precisa fornecer um token JWT válido para acessar as rotas protegidas.</p>
<h2>Requisitos</h2>
<ul>
    <li>PHP >= 7.4</li>
    <li>Composer</li>
    <li>Laravel >= 8.0</li>
    <li>Pacote "tymon/jwt-auth"</li>
    <li>Pacote "darkaonline/l5-swagger"</li>
</ul>
<h2>Instalação</h2>
<ol>
    <li>Clone o repositório para o seu computador.</li>
    <li>Abra o terminal na pasta do projeto e execute o comando <code>composer install</code> para instalar as dependências.</li>
    <li>Copie o arquivo <code>.env.example</code> para um novo arquivo chamado <code>.env</code> e configure as variáveis de ambiente, como o banco de dados.</li>
    <li>Execute o comando <code>php artisan key:generate</code> para gerar uma nova chave de aplicativo.</li>
    <li>Execute o comando <code>php artisan migrate</code> para criar as tabelas do banco de dados.</li>
    <li>Execute o comando <code>php artisan db:seed</code> para popular o banco de dados com dados de teste.</li>
    <li>Execute o comando <code>php artisan jwt:secret</code> para gerar uma chave secreta para o pacote JWT.</li>
</ol>
<h2>Utilização</h2>
<p>Para utilizar a API, você pode enviar solicitações HTTP usando uma ferramenta como o Postman.</p>
<h3>Registro de usuário</h3>
<p>Para registrar um novo usuário, envie uma solicitação POST para a rota <code>/api/register</code> com os seguintes campos no corpo da solicitação em formato JSON:</p>
{
    "name": "Seu nome",
    "email": "seuemail@exemplo.com",
    "password": "suasenha"
}

{
"message": "Usuário criado com sucesso"
}
<h3>Autenticação</h3>
<p>Para se autenticar na API, envie uma solicitação POST para a rota <code>/api/login</code> com as credenciais do usuário em formato JSON:</p>
{
"email": "seuemail@exemplo.com",
"password": "suasenha"
}

O servidor retornará uma resposta JSON contendo um token de autenticação JWT:

{
"access_token": "seu_token_jwt",
"token_type": "Bearer",
"expires_in": 3600
}


Esse token deve ser incluído no cabeçalho "Authorization" de todas as solicitações protegidas pela autenticação JWT. O valor do cabeçalho deve ser "Bearer {seu_token_jwt}".


<h3>Endpoints da API</h3>
Os endpoints da API são os seguintes:

<h3>Endpoints da API</h3>

<table>
  <thead>
    <tr>
      <th>Endpoint</th>
      <th>Método HTTP</th>
      <th>Descrição</th>
      <th>Parâmetros</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>/api/products</td>
      <td>GET</td>
      <td>Retorna uma lista de todos os produtos cadastrados</td>
      <td>Nenhum</td>
    </tr>
    <tr>
      <td>/api/products/{id}</td>
      <td>GET</td>
      <td>Retorna os detalhes de um produto específico</td>
      <td>id: ID do produto</td>
    </tr>
    <tr>
      <td>/api/products</td>
      <td>POST</td>
      <td>Cria um novo produto</td>
      <td>name: Nome do produto<br>price: Preço do produto<br>description: Descrição do produto</td>
    </tr>
    <tr>
      <td>/api/products/{id}</td>
      <td>PUT</td>
      <td>Edita as informações de um produto existente</td>
      <td>id: ID do produto a ser editado<br>name: Novo nome do produto (opcional)<br>price: Novo preço do produto (opcional)<br>description: Nova descrição do produto (opcional)</td>
    </tr>
  </tbody>
</table>

Para acessar os endpoints protegidos pela autenticação JWT, é necessário incluir o token de autenticação JWT no cabeçalho "Authorization" da solicitação.

<h3>Documentação da API com Swagger</h3>
A API também inclui documentação gerada automaticamente com Swagger. Para acessar a documentação, execute o servidor local e abra o seguinte URL em seu navegador:


http://localhost:8000/api/documentation


Isso abrirá a interface do Swagger, onde você pode visualizar a lista completa de endpoints da API, seus parâmetros e exemplos de solicitação e resposta.
