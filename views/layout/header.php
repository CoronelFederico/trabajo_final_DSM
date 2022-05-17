<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Despensa Señor de Mailin - online</title>
  <link rel="stylesheet" href="<?= baseUrl ?>/assets/css/estilo.css" />
  <link rel="shortcut icon" type="image/x-icon" href="<?= baseUrl ?>assets/img/icon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet" />
</head>

<body class="grid-container hidden">


  <header class="header">
    <a class="logo" href="<?= baseUrl ?>">
      <img src="<?= baseUrl ?>assets/img/logon.png" id="logo" alt="logo" class="animate__animated animate__bounce" />
    </a>

    <nav class="navbar">
      <ul class="menu-horizontal">
        <li><a href="<?= baseUrl ?>"> Inicio</a></li>

        <li>
          <a href="#" id="category"> Categorias</a>
          <?php $categorias = Utils::showCategorias(); ?>
          <ul class="menu-vertical">
            <?php while ($cat = $categorias->fetch_object()) : ?>
              <li>
                <a class="m-categoria" href="<?= baseUrl ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre; ?></a>
              </li>
            <?php endwhile; ?>
          </ul>
        </li>
      </ul>
    </nav>

  </header>

  <!--  -->
  <aside class="sidebar"> 