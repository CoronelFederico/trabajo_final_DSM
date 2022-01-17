<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>dsm - online</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?=baseUrl?>assets/img/icon.ico">
	<link rel="stylesheet" href="<?= baseUrl ?>assets/css/styles.css" />
	<link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>
	<div id="container">
		<!-- CABECERA -->
		<header id="header">
			<div id="logo">
				<a href="<?= baseUrl ?>">
					<img src="<?= baseUrl ?>assets/img/logo.jpg" alt="Logo" /></a>
			</div>
		</header>

		<!-- MENU -->
		<?php $categorias = Utils::showCategorias(); ?>
		<nav id="menu">
			<ul>
				<li>
					<a href="<?=baseUrl?>">Inicio</a>
				</li>
				<?php while ($cat = $categorias->fetch_object()) : ?>
					<li>
						<a href="<?=baseUrl?>/categoria/ver&id=<?=$cat->id?>"><?= $cat->nombre; ?></a>
					</li>
				<?php endwhile; ?>

			</ul>
		</nav>

		<div id="content">