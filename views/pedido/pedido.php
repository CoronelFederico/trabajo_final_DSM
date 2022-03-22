<?php if (isset($_SESSION['identity'])) : ?>
    <h1>Direccion de envio</h1>
    <?php $stats = Utils::statsCart(); ?>
    <h3>Productos seleccionados: <?= $stats['count'] ?></h3>
    <h3>Total a pagar: $<?= $stats['total'] ?></h3>
    <a href="<?= baseUrl ?>carrito/index">Observar precios y productos del pedido</a>

    <h1>Completa datos personales para realizar elenvio</h1>
    <form action="<?= baseUrl ?>pedido/add" method="POST">

        <label for="direccion">Direccion</label>
        <input type="text" id="direccion" name="direccion" placeholder="Ingresa direccion" required autofocus>

        <label for="contacto">Contacto</label>
        <input type="number" id="contacto" name="contacto" placeholder="Ingresa contacto" required autofocus title="El numero de contacto debe contener 10 caractere numericos">

        <input type="submit" value="Confirmar pedido">
    </form>

<?php else : ?>
    <h1>Necesitas estar registrado en el sistema para poder realizar un pedido.</h1>
    <?php if (!isset($_SESSION['identity'])) : ?>
        <p><a href="#email" style="color: grey;">Registrarse o Iniciar sesion.</a></p>
    <?php endif; ?>
<?php endif ?>