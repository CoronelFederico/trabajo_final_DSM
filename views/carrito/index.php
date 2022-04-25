<h1>TU CARRITO</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>


    <Table>
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
                    <a href="<?= baseUrl ?>carrito/up&index=<?= $indice ?>" class="button button-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </a>
                    <!-- stock -->
                    <p style="text-align: center;"><?= $valor['unidad'] ?></p>
                    <!-- disminuir -->
                    <a href="<?= baseUrl ?>carrito/down&index=<?= $indice ?>" class="button button-red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                        </svg>
                    </a>
                </td>
                <td><?= $producto->stock ?></td>
                <td>
                    <a href="<?= baseUrl ?>carrito/delete&index=<?= $indice ?>" class="button button-red">Eliminar</a>

                </td>
            </tr>
        <?php endforeach; ?>

    </Table>
    <?php $stats = Utils::statsCart(); ?>
    <div id="detail-product">
        <h1>Total a pagar: $<?= $stats['total'] ?></h1>
        <a href="<?= baseUrl ?>pedido/pedido" class="boton">
            <div #boton>
                <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </div>
                <span id="ped">Realizar pedido</span>
                <div class="icono line ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                    </svg>
                </div>
            </div>
    </div> <br>
    <a href="<?= baseUrl ?>carrito/deleteAll" class="button button-red">Eliminar carrito</a>
<?php else : ?>
    <h3>El carrito esta vacio.</h3>
<?php endif; ?>