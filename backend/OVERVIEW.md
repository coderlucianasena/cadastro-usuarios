# Sistema de Cadastro de Usuários - Back-end

Este projeto é um sistema simples de cadastro de usuários que desenvolvi para aprender sobre a interação entre front-end e back-end. Utilizei PHP para o back-end, Angular para o front-end, e MySQL como banco de dados. Este README cobre a configuração e desenvolvimento do back-end.

## Tecnologias Utilizadas

- **PHP**: Escolhi PHP como a linguagem de programação para o desenvolvimento do back-end.
- **MySQL**: Utilizei MySQL como banco de dados relacional para armazenar as informações dos usuários.
- **PDO (PHP Data Objects)**: Usei a extensão PDO do PHP para interagir com o banco de dados MySQL.
- **Apache**: Configurei o servidor web Apache para hospedar o back-end.

## Ferramentas Utilizadas

- **XAMPP**: Utilizei o XAMPP como ambiente de desenvolvimento local, que inclui Apache, MySQL, PHP e phpMyAdmin.
- **Postman**: Usei o Postman para testar as requisições HTTP da API RESTful.
- **Visual Studio Code**: Escolhi o VS Code como meu editor de código principal para o desenvolvimento.
- **phpMyAdmin**: Utilizei o phpMyAdmin, incluído no XAMPP, para gerenciar visualmente o banco de dados M

## Estrutura do Projeto
projeto-cadastro-usuarios/ 
└── backend/ 
   ├── config/ │ 
      └── database.php 
   ├── api/ │ 
      └── users.php 
   └── .htaccess

## Passo a Passo do Desenvolvimento

1. **Configuração do Banco de Dados**:
   - Criei um arquivo `database.php` dentro da pasta `config/` para gerenciar a conexão com o banco de dados MySQL usando PDO.
   - Configurei as credenciais do banco de dados, incluindo host, nome do banco, usuário e senha.

2. **Desenvolvimento da API de Usuários**:
   - Desenvolvi um arquivo `users.php` dentro da pasta `api/` para gerenciar as operações CRUD (Create, Read, Update, Delete) dos usuários.
   - Implementei diferentes métodos HTTP (GET, POST, PUT, DELETE) para listar, adicionar, atualizar e excluir usuários.

3. **Configuração do .htaccess**:
   - Configurei um arquivo `.htaccess` para redirecionar todas as requisições para o arquivo `users.php`, permitindo uma API RESTful.

## Erros e Soluções

1. **Erro de Conexão com o Banco de Dados**:
   - Inicialmente, enfrentei um problema de conexão com o banco de dados devido à porta padrão do MySQL não está disponivel(3306). 
   - Solução: Configurei para que funcionasse na porta 3307 do MySQL no arquivo my.ini do XAMPP. Atualizei o arquivo `config.inc.php` do phpMyAdmin para incluir a porta correta e ajustei as configurações de conexão no arquivo `database.php`.

2. **Problemas com Autenticação no phpMyAdmin**:
   - O phpMyAdmin não estava se conectando corretamente ao MySQL devido à configuração da porta.
   - Solução: Atualizei o arquivo `config.inc.php` para especificar a porta 3307 e garanti que as credenciais de autenticação estavam corretas.

3. **Configuração do Apache**:
   - Houve a necessidade de garantir que o Apache estava corretamente configurado para servir os arquivos PHP.
   - Solução: Verifiquei e ajustei as configurações do Apache, atualizando o arquivo `httpd-xampp.conf`, para garantir que o phpMyAdmin e o back-end estavam acessíveis.

4. **Atualização da Porta no database**:
   - Identifiquei um problema relacionado à conexão com o banco de dados MySQL.
   - O problema estava na configuração da porta utilizada para a conexão. 
     A conexão estava configurada para usar a porta padrão, mas o servidor MySQL estava operando na porta 3307. 
     A correção foi feita no arquivo de configuração do banco de dados (backend/config/database.php), onde a porta correta foi especificada:
     `private $host = "localhost:3307";`

5. **Diretório Incorreto**: 
   - A pasta do projeto estava localizada em um diretório incorreto, o que causava dificuldades na execução e no gerenciamento do projeto.
   - Houve uma reorganização da estrutura do projeto. 
     A estrutura foi corrigida para garantir que todos os componentes do projeto (back-end, front-end e banco de dados) estejam organizados de maneira lógica e acessível.
     Colocando.
     A pasta do projeto foi movida para o diretório padrão do XAMPP `C:\xampp\htdocs`
     O que é uma prática comum para facilitar o desenvolvimento e a execução de projetos PHP localmente. 
     Essa mudança garante que o servidor Apache do XAMPP possa acessar facilmente os arquivos do projeto, facilitando o desenvolvimento e o teste.
     
## Como Executar

1. **Configurar o Banco de Dados**:
   - Importe o arquivo SQL fornecido (`database/users.sql`) para criar a tabela de usuários no MySQL.

2. **Configurar o Servidor PHP**:
   - Certifique-se de que o servidor Apache está rodando através do XAMPP ou outra solução similar.

3. **Testar a API**:
   - Usei o Postman para testar as requisições HTTP para a API de usuários no XAMPP.

4. **Acessar o phpMyAdmin**:
   - Acesse `http://localhost/phpmyadmin` para gerenciar o banco de dados visualmente.

## Considerações Finais

Este projeto foi uma excelente oportunidade para eu aprender sobre a interação entre front-end e back-end, além de praticar operações CRUD em um banco de dados. A resolução dos problemas encontrados durante o desenvolvimento proporcionou um aprendizado valioso sobre configuração de ambiente e depuração de erros.

Se tiver dúvidas ou precisar de mais informações, sinta-se à vontade para entrar em contato comigo!