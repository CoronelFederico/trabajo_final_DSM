<h1>GESTION DE PRODUCTOS</h1>
<a href="<?= baseUrl ?>producto/crear" class="button button-small">Crear producto</a>
<!-- cargar productos -->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong style="color:green">EL producto fue cargado correctamente.</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong style="color:red">El producto no fue cargado. </strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<!-- eliminar productos -->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong style="color:green">EL producto fue eliminado correctamente.</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong style="color:red">El producto no fue eliminado. </strong>
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
        <th>OFERTA</th>
        <th>IMAGEN</th>
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
            <td><?= $pro->oferta; ?></td>
            <td><?= $pro->imagen; ?></td>
            <td><?= $pro->fecha; ?></td>
            <td>
                <a href="<?=baseUrl?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">modificar</a>
                <a href="<?=baseUrl?>producto/eliminar&id=<?=$pro->id?>" class="button button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>