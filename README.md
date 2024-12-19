# Apresentação do Projeto de Back-end: Sistema de Cadastro de Usuários

## Visão Geral

O projeto de back-end foi desenvolvido utilizando PHP e MySQL, com o objetivo de gerenciar as operações de CRUD (Create, Read, Update, Delete) para um sistema de cadastro de usuários. Este sistema é responsável por fornecer uma API RESTful que permite a interação com o banco de dados, garantindo a persistência e manipulação dos dados dos usuários.

## Arquitetura e Estrutura

### Estrutura de Diretórios

```plaintext
C:\xampp\htdocs\projeto-cadastro-usuarios\
│
├── backend/
│   ├── config/
│   │   └── database.php
│   ├── api/
│   │   └── users.php
│   └── .htaccess
```

- **config/**: Contém a configuração do banco de dados, incluindo as credenciais de conexão.
- **api/**: Contém o arquivo `users.php`, que implementa a lógica de API para gerenciar as operações de CRUD.
- **.htaccess**: Configura o servidor Apache para redirecionar as requisições para o arquivo correto.

### Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada para desenvolver a lógica do servidor.
- **MySQL**: Banco de dados relacional utilizado para armazenar as informações dos usuários.
- **PDO (PHP Data Objects)**: Extensão do PHP utilizada para interagir com o banco de dados de forma segura e eficiente.

## Funcionalidades

### 1. Conexão com o Banco de Dados

A conexão com o banco de dados é gerenciada pelo arquivo `database.php`, que utiliza a extensão PDO para estabelecer uma conexão segura e eficiente com o MySQL.

### 2. API RESTful

O arquivo `users.php` implementa uma API RESTful que suporta os seguintes métodos HTTP:

- **GET**: Recupera a lista de usuários do banco de dados.
- **POST**: Adiciona um novo usuário ao banco de dados.
- **PUT**: Atualiza as informações de um usuário existente.
- **DELETE**: Remove um usuário do banco de dados.

### 3. Segurança e Validação

- **Validação de Dados**: Antes de qualquer operação de banco de dados, os dados recebidos são validados para garantir sua integridade.
- **Prepared Statements**: Utilizados para prevenir ataques de SQL Injection, garantindo que as operações de banco de dados sejam seguras.

## Demonstração

### Exemplo de Requisição GET

Para listar todos os usuários, uma requisição GET pode ser feita para o endpoint `/api/users.php`, que retornará um JSON com os dados dos usuários.

### Exemplo de Requisição POST

Para adicionar um novo usuário, uma requisição POST deve ser enviada com um corpo JSON contendo os campos `name` e `email`. O servidor responderá com uma mensagem de sucesso ou erro.

## Conclusão

Este projeto de back-end foi desenvolvido com foco na simplicidade e eficiência, utilizando práticas recomendadas para garantir a segurança e a escalabilidade do sistema. Ele serve como uma base sólida para o desenvolvimento de funcionalidades adicionais e a integração com o front-end desenvolvido em Angular.

