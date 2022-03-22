<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>dsm - online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?= baseUrl ?>assets/img/icon.ico">
	<link rel="stylesheet" href="<?= baseUrl ?>assets/css/styles.css" />
	<link rel="stylesheet" href="<?= baseUrl ?>assets/css/stylesvg.css" />

	<!-- alerta -->
	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

	<!-- 
    RTL version
-->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />


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
					<a href="<?= baseUrl ?>">Inicio</a>
				</li>
				<?php while ($cat = $categorias->fetch_object()) : ?>
					<li>
						<a href="<?= baseUrl ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre; ?></a>
					</li>
				<?php endwhile; ?>

			</ul>
		</nav>

		<div id="content">