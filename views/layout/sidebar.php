<!-- BARRA LATERAL -->
<aside id="lateral">

	<div id="login" class="block_aside">

		<?php if (!isset($_SESSION['identity'])) : ?>

			<h3>Entrar a la web</h3>

			<form action="<?= baseUrl ?>usuario/login" method="post">
				<label for="email">Email</label>
				<input type="email" name="email" />
				<label for="password">Contraseña</label>
				<input type="password" name="password" />
				<input type="submit" value="Enviar" />
			</form>
		<?php else : ?>
			<h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
		<?php endif; ?>
		<ul>
			<?php if (isset($_SESSION['admin'])) : ?>
				<li><a href="<?=baseUrl?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?=baseUrl?>producto/gestion">Gestionar productos</a></li>
				<li><a href="<?=baseUrl?>pedidos/index">Gestionar pedidos</a></li>
			<?php endif; ?>

			<?php if (isset($_SESSION['identity'])) : ?>
				<li><a href="#">Mis pedidos</a></li>
				<li><a href="<?= baseUrl ?>usuario/logout">Cerrar sesion</a></li>
				

			<?php else: ?>
			
				<li><a href="<?= baseUrl ?>usuario/registro">Registrarse</a></li>
				
			<?php endif; ?>

		</ul>
	</div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">