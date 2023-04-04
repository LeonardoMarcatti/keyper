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
         <span>
            <h1>Keyper</h1>
            <?php
               if (session()->has('id')) { ?>
                  <a href="<?= url_to('logout') ?>">Sair</a>
            <?php } ?>
         </span>
         <span id="flash"><?= session()->getFlashdata('message') ?? '' ?></span>
         
      </header>
      