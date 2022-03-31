<?php if (isset($pedido)) : ?>
    <h1>Detalle del pedido Nº <?= $pedido->id ?></h1>

    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= baseUrl ?>pedido/estado" method="POST">
            <input type="hidden" value="<?= $pedido->id ?>" name="pedido_id">

            <label from="estado">Seleccionar el estado del producto.</label>
            <select name="estado" id="estado">
                <option>--Estado del pedido actual: <b><?= Utils::showStatus($pedido->estado) ?></b>--</option>
                <option value="confirmado">Confirmado</option>
                <option value="pending">Pendiente a recibir el pago</option>
                <option value="preparation">En preparacion</option>
                <option value="deliver">Entregado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif; ?>




    <h4>Datos del pedido</h4>
    <p> Orden del pedido: <strong> <?= $pedido->id ?> </strong> </p>
    <p> TOTAL del pedido: <strong>$<?= $pedido->costo ?></strong> </p>


    <p>Productos pedidos:


    <table> <strong>
            <tr>
                <!-- <th>id del producto</th> -->

                <th>Imagen del producto</th>
                <th>Nombre del producto</th>
                <th>Precio del producto</th>
                <th>unidades compradas</th>
            </tr> 
            <?php while ($producto = $productos->fetch_object()) : ?>
                <tr>
                    <!-- <td><?= $producto->id ?></td> -->

                    <td><?php if ($producto->imagen != null) : ?>
                            <img class="img_carrito" src="<?= baseUrl ?>uploads/images/<?= $producto->imagen; ?>" />
                        <?php else : ?>
                            <img class="img_carrito" src="<?= baseUrl ?>uploads/images/imagen-no-disponible.gif" />
                        <?php endif ?>
                    </td>
                    <td> <a href="<?= baseUrl ?>producto/ver&id=<?= $producto->id ?>"> <?= $producto->nombre ?></a></td>
                    <td>$<?= $producto->precio ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>
                <?php

                if (Utils::showStatus($pedido->estado) && Utils::showStatus($pedido->estado) == "Hemos entregado tu pedido.") {

                    $estado = Utils::showStatus($pedido->estado);

                    // $stock = array(
                    //     'id' => $producto->id,
                    //     'unidad' => $producto->unidades
                    // );

                    $id=$producto->id;
                    $unidad=$producto->unidades;

                    ProductoController::stock($id,$unidad);

                    // echo '<pre>';
                    // var_dump($stock);
                }
                ?>


            <?php endwhile; ?>



    </table>
    <p> <b><?= Utils::showStatus($pedido->estado) ?></b></p>
    <p> <i> Direccion del pedido a entregar: <?= $pedido->direccion ?> </i></p>


<?php else : ?>
    <h1>error</h1>
<?php endif; ?>