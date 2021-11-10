# Athenas_CRUD
Teste para a empresa Athenas onde é implementado um sistema CRUD  utilizando o Framework PHP Laravel, MySQL e VueJS e consumindo dados através de uma API REST.

<h2>Execução dos projetos</h2><br><br>
<h3>*Back-end - CRUD_api*</h3><br><br>
Obs: Necessário ter o Composer instalado em sua máquina. Download do composer: https://getcomposer.org/download/<br><br>
Após baixar o projeto back-end é necessário fazer alguns ajustes. <br>
  1 - Instalando dependências: Rode o comando "composer install" dentro do terminal em sua pasta crud_api.<br><br>
  2 - Configuração do banco de dados:<br><br>
    Crie um banco de dados local com o nome de athenas_db ou o de sua escolha.<br>
    Após criar o banco de dados, dentro do projeto, copie o arquivo .env.example e cole no mesmo local, renomeando-o para .env.<br>
    Acesse este novo arquivo e insira as informações de acesso ao seu banco de dados trocando as informações que forem necessárias. Deve ficar desta maneira:<br><br>
      DB_CONNECTION=mysql<br>
      DB_HOST=127.0.0.1<br>
      DB_PORT=3306<br>
      DB_DATABASE=athenas_db<br>
      DB_USERNAME=root<br>
      DB_PASSWORD=password<br>
      <br>
 3 - Gerar a chave JWT<br>
     Utilize o comando "php artisan jwt:secret" para gerar a chave<br><br>
 4 - Rodando as migrations:<br>
      Após toda a configuração, utilize o comando "php artisan migrate" para rodar as migrations<br><br>
 5 - Rodando os Seeds<br>
      Com as migrations criadas, utilize o comando "php artisan db:seed" para que os seeders sejam inseridos no banco de dados<br><br>
 6 - Executando o projeto<br>
      Utilize o comando "php artisan serve" para iniciar o servidor. <br><br>

  <p>************************************************************************************</p>

<h3>*Front-end - CRUD_system*</h3><br><br>
Obs: Necessário ter o Node e NPM instalado em sua máquina. Link pra download: https://nodejs.org/en/download/ <br><br>
Após baixar o projeto front-end é necessário fazer alguns ajustes. <br>
  1 - Instalar dependências. <br>
    Após fazer o download do projeto, execute o comando "npm install" para instalar todas as dependências que o projeto necessita<br><br>
  2 - Executando o projeto:<br>
    Utilize o comando "npm run serve" para iniciar o projeto.<br>

  <p>************************************************************************************</p>

<h3>Tela de Login</h3>
<p>Dados para autenticação: <br>
  email: adm@email.com<br>
  senha: 123123<br>






      
      
      
      
