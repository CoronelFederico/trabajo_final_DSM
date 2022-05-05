<h1>GESTION DE PRODUCTOS</h1>
<a href="<?= baseUrl ?>producto/crear" class="button_slide slide_right">Crear producto</a>

<!-- cargar productos -->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <p id="alert" class="animate__animated animate__backInLeft"><strong style="color:green">El producto fue cargado correctamente.</strong></p>

<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <p id="alert" class="animate__animated animate__backInLeft"><strong style="color:red">El producto no fue cargado. </strong></p>

<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<!-- eliminar productos -->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <p id="alert" class="animate__animated animate__backInLeft"><strong style="color:green">El producto fue eliminado correctamente.</strong></p>

<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <p id="alert" class="animate__animated animate__backInLeft"><strong style="color:red">El producto no puede ser eliminado. </strong></p>
    
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>


<table>
    <tr>
        <th>ID</th>
        <th>CATEGORIA</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <!-- <th>OFERTA</th> -->
        <th>FECHA AGREGADA</th>
        <th>ACCIONES</th>

    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->categoria_id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->descripcion; ?></td>
            <td>$<?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <!-- <td><?= $pro->oferta; ?></td> -->
            <td><?= $pro->fecha; ?></td>
            <td class="but">
                <a href="<?= baseUrl ?>producto/editar&id=<?= $pro->id ?>" class="button_slide slide_right">Modificar</a>
                <a href="<?= baseUrl ?>producto/eliminar&id=<?= $pro->id ?>" class="button_slide slide_down button_red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<?php Utils::alert() ?>