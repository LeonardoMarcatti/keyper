<h2>Introdução</h2>
<p> Esse programa foi construído com tecnologias PHP, mais precisamente, foi utilizado o framework CodeIgniter em sua versão 4.3.3</p>
<p>Ele se destina a gerenciamento de chaves por parte do pessoal da prevenção do Grupo Muffato.</p>

<h3>Instalação</h3>
<p>É necessário ter instalado em sua máquina Apache2, PHP 7/8+, MySQL/MariaDB, Git e Composer.</p>
<p>Faça a clonagem do repositório em sua máquina, entre na pasta do projeto e execute o comando composer install</p>

<h3>Configuração</h3>
<h4>Arquivo .env</h4>
<p>Esse arquivo de variáveis de ambiente deve ser mudada uma linha: CI_ENVIRONMENT = production</p>
<h4>app/Config/App.php</h4>
<p>A linha que contém $baseURL = 'ip_do_servidor/caminho_até_public/'</p>
  <h4>Arquivo app/Config/DataBase</h4>
    <p>Aqui algumas linhas devem ser mudadas:
      'hostname' => 'ip',
        'username' => 'seu usuario',
        'password' => 'sua senha',
        'database' => 'nome DB',
        'DBDriver' => 'MySQL/Postgres/etc',
        'DBPrefix' => '',
        'pConnect' => false/true,
        'DBDebug'  => true/true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false/true,
        'compress' => false/true,
        'strictOn' => false/true,
        'failover' => [],
        'port'     => numero_porta,</p>