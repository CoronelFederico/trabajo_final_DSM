</div>
</div>

<!-- PIE DE PÁGINA -->
<footer id="footer">
	<?php if (!isset($_SESSION['identity'])) : ?>
		<p>Para poder observar los precios de los productos presentes y agregarlo al carrito debes estar registrado en nuestras bases de datos. <a href="#email" style="color: wheat;">Registrarse o iniciar sesion.</a></p>
	<?php endif; ?>
	<p>&copy; <?= date('Y') ?></p>
</footer>
</div>
</body>

</html>