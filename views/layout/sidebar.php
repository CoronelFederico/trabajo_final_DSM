<!-- BARRA LATERAL -->
<aside id="lateral">


	<?php if (!isset($_SESSION['admin'])) : ?>
		<div id="carrito" class="block_aside">
			<h3>Mi carrito</h3>
			<ul>
				<?php $stats = Utils::statsCart(); ?>
				<li><a href="<?= baseUrl ?>carrito/index">Productos:(<?= $stats['count'] ?>)</a></li>
				<li><a href="<?= baseUrl ?>carrito/index">Total a pagar: $<?= $stats['total'] ?></a></li>
				<li><a href="<?= baseUrl ?>carrito/index">Ir a mi carrito</a></li>
			</ul>
		</div>
	<?php endif; ?>

	<div id="login" class="block_aside">

		<?php if (!isset($_SESSION['identity'])) : ?>

			<h3>Iniciar sesion</h3>
			<h4><?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] = "identificaion fallida") : ?>
					<h5 style="color:red">El correo electrónico o contraseña que ingresaste no está relacionada a nuestra base de datos. Comprueba datos ingresados.</h5>
				<?php endif; ?>
				<?php Utils::deleteSession('error_login'); ?>

			</h4>


			<form id="formulario" action="<?= baseUrl ?>usuario/login" method="post">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" />
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" />
				<input type="submit" value="Enviar" />
			</form>
		<?php else : ?>
			<h3 style="text-transform: uppercase;"><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
		<?php endif; ?>
		<ul>
			<?php if (isset($_SESSION['admin'])) : ?>
				<li><a href="<?= baseUrl ?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?= baseUrl ?>producto/gestion">Gestionar productos</a></li>
				<!-- <li><a href="<?= baseUrl ?>producto/update">Actualizar producto</a></li> -->
				<li><a href="<?= baseUrl ?>pedido/gestion">Gestionar pedidos</a></li>
			<?php endif; ?>

			<?php if (isset($_SESSION['identity'])) : ?>

				<?php if (!isset($_SESSION['admin'])) : ?>
					<li><a href="<?= baseUrl ?>pedido/mispedidos">Mis pedidos</a></li>
				<?php endif; ?>

				<li><a href="<?= baseUrl ?>usuario/logout">Cerrar sesion</a></li>


			<?php else : ?>
				<h5>¿Todavia no tienes una cuenta?.</h5>
				<li><a href="<?= baseUrl ?>usuario/registro">Registrate aqui.</a></li>
			<?php endif; ?>

		</ul>
	</div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">