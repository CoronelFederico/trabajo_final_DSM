<h1>Registro</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong style="color:greenyellow">Usuario creado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong style="color:red">Usuario no registrado</strong>
<?php endif; ?>

<?php Utils::deleteSession('register');?>

<form action="<?= baseUrl ?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" title="Ingresar el nombre" required>

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido" title="Ingresar el apellido" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" title="Ingresar un Email valido" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]" title="Una contraseña válida consiste de una letra mayúscula o minúscula, un dígito. La contraseña debe empezar con una letra y contener al menos un dígito" required>

    <input type="submit" class="button" value="enviar">
</form>