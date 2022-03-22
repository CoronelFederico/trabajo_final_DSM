<h1>Registro</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong style="color:greenyellow">Usuario creado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong style="color:red">Usuario no registrado</strong>
<?php endif; ?>

<?php Utils::deleteSession('register');?>

<form action="<?= baseUrl ?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="enviar">
</form>