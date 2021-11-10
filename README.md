# Athenas_CRUD
Teste para a empresa Athenas onde é implementado um sistema CRUD  utilizando o Framework PHP Laravel, MySQl e VueJS

Execução dos projetos
*Back-end - CRUD_api*
Após baixar o projeto back-end é necessário fazer alguns ajustes.
  1 - Instalando dependências: Rode o comando "composer install" dentro do terminal em sua pasta crud_api.
  2 - Configuração do banco de dados:
    Crie um banco de dados local com o nome de athenas_db ou o de sua escolha.
    Após criar o banco de dados, dentro do projeto, copie o arquivo .env.example e cole no mesmo local, renomeando-o para .env.
    Acesse este novo arquivo e insira as informações de acesso ao seu banco de dados trocando as informações que forem necessárias. Deve ficar desta maneira:
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=athenas_db
      DB_USERNAME=root
      DB_PASSWORD=password
      
      
