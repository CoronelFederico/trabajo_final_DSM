<h1>TU CARRITO</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>


    <table>
        <tr>
            <th>Imagen del producto</th>
            <th>Nombre del producto</th>
            <th>Precio</th>
            <th>Unidad</th>
            <th>Unidad disponible</th>
            <th>Eliminar producto</th>
        </tr>

        <?php foreach ($carrito as $indice => $valor) :
            $producto = $valor['producto']; ?>
            <tr>
                <td><?php if ($producto->imagen != null) : ?>
                        <img class="img_carrito" src="<?= baseUrl ?>uploads/images/<?= $producto->imagen; ?>" />
                    <?php else : ?>
                        <img class="img_carrito" src="<?= baseUrl ?>uploads/images/imagen-no-disponible.gif" />
                    <?php endif ?>
                </td>
                <td> <a href="<?= baseUrl ?>producto/ver&id=<?= $producto->id ?>"> <?= $producto->nombre ?></a></td>
                <td>$<?= $producto->precio ?></td>
                <td>
                    <!-- aumentar -->
                    <a href="<?= baseUrl ?>carrito/up&index=<?= $indice ?>" class="button_slide button_green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </a>
                    <!-- stock -->
                    <p style="text-align: center;"><?= $valor['unidad'] ?></p>
                    <!-- disminuir -->
                    <a href="<?= baseUrl ?>carrito/down&index=<?= $indice ?>" class="button_slide button_red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                        </svg>
                    </a>
                </td>
                <td><?= $producto->stock ?></td>
                <td>
                    <a href="<?= baseUrl ?>carrito/delete&index=<?= $indice ?>" class="button_slide button_red">Eliminar</a>

                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <?php $stats = Utils::statsCart(); ?>
    <div id="confirm_" class="confirm">
        <h1>Total a pagar: $<?= $stats['total'] ?></h1>
        <a href="<?= baseUrl ?>carrito/deleteAll" class="button_slide button_red">Eliminar carrito</a>
        <a href="<?= baseUrl ?>pedido/pedido" class="button_slide button_green slide_left"> Realizar pedido</a>
    </div> <br>

<?php else : ?>
    <h3>El carrito esta vacio.</h3>
<?php endif; ?>