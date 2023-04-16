<!DOCTYPE html>
<html lang="pt-BR">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="content-type" content="text/html">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="icon" href="https://images.freeimages.com/fic/images/icons/996/vista_alarm/256/keys.png" type="image/png" sizes="16x16">
      <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
      <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
      <script src="<?= base_url('assets/js/script.js') ?>" defer></script>
      <title>PHP</title>
   </head>
   <body>
      <header>
         <div id="flash">
            <?php
               if (session()->getFlashdata('message')) { ?>
                  <p><?= session()->getFlashdata('message') ?></p>
            <?php } ?>
         </div>
         <span>
            <h1>Keyper</h1>
            <?php
               if (session()->has('id') && session()->getFlashdata() == null ) { ?>
                  <a href="<?= url_to('logout') ?>">Sair</a>
            <?php } ?>
         </span>
         <?php
            if (session()->has('id') && session()->getFlashdata() == null) { ?>
               <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid" id="navbar">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Relatórios
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?=url_to('reportKey')?>">Chaves</a></li>
                <li><a class="dropdown-item" href="#">Usuários</a></li>
                <?php 
                  if (session()->get('boss') == 1) { ?>
                    <li><a class="dropdown-item" href="#">Prevenção</a></li>
                <?php  };
                ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastros
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?=url_to('register_key')?>">Chaves</a></li>
                <li><a class="dropdown-item" href="<?= url_to('registerUser') ?>">Usuários</a></li>
                <?php 
                  if (session()->get('boss') == 1) { ?>
                    <li><a class="dropdown-item" href="<?= url_to('registerStaff') ?>">Prevenção</a></li>
                <?php  };
                ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Chaves
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?=url_to('taken')?>">Empréstimo</a></li>
                <li><a class="dropdown-item" href="<?=url_to('transfer')?>">Transferência</a></li>
                <li><a class="dropdown-item" href="<?=url_to('return')?>">Devolução</a></li>
              </ul>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=url_to('setup')?>">Configurações</a>
          </li>
        </ul>
      </div>
      <small>Bem vindo  <?= strtoupper(session()->get('name'))?></small>
    </div>
  </nav>
            <?php }
         ?>
      </header>
      