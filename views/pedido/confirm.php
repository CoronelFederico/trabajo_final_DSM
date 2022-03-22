<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'Confirmado') : ?>
    <h1>EL PEDIDO FUE CONFIRMADO</h1>
    <?php $stats = Utils::statsCart() ?>
    <p>Tu pedido fue recibido con exito. Debes realizar una transferencia bancaria con el total de <strong> $<?= $stats['total'] ?></strong>
        para que podamos procesar y enviar los productos.</p>
    <br><br>
    <table>
        <tr>
            <Label style="text-align: center;">DATOS DE LA CUENTA BANCARIA</Label>
        </tr>
        <tr>
            <th>CVU/CBU</th>
            <th>ALIAS</th>
            <th>NOMBRE DE LA CUENTA</th>
            <th>CUIL</th>
            <th>BANCO</th>
        </tr>
        <tr>
            <td>0000007900204244407966</td>
            <td>coronel.federico.mp</td>
            <td>Federico David Coronel</td>
            <td>20-42444079-6</td>
            <td>Mercado Pago</td>
        </tr>
    </table>

    <hr>
    <?php if (isset($pedido)) : ?>
        <h4>Datos del pedido</h4>
        <p> Orden del pedido: <strong> <?= $pedido->id ?> </strong> </p>
        <p> TOTAL del pedido: <strong>$<?= $pedido->costo ?></strong> </p>
        <p>Productos pedidos:
        <table> <strong>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades compradas</th>

            </tr>
                <?php while ($producto = $productos->fetch_object()) : ?>
                    <tr>
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
                <?php endwhile; ?>
                <strong></p>
        </table>


        <a href="<?= baseUrl?>carrito/deleteALLPedido" class="button">Aceptar</a>
    <?php endif; ?>

<?php else : ?>
    <h1>EL PEDIDO NO FUE CONFIRMADO</h1>
<?php endif; ?>

<!-- <script>
        function r(){
            location.href="<?= baseUrl ?>";
        }
        setTimeout("r()",5000);
    </script> -->