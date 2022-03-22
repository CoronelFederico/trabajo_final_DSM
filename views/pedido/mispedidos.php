<?php if (!isset($gestion)) : ?>
    <h1>Mis pedidos</h1>
<?php else : ?>
    <h1>Gestion de pedidos</h1>
<?php endif; ?>


<Table>
    <tr>
        <th>Orden del pedido</th>
        <th>Costo del pedido</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado</th>
    </tr>

    <?php while ($ped = $pedidos->fetch_object()) : ?>
        <tr>
            <td> 
                <a href="<?= baseUrl ?>pedido/detalle&id=<?= $ped->id ?>" class="button"> 
                    Ver orden: <?= $ped->id ?>  
                </a></td>
            <td>$<?= $ped->costo ?></td>
            <td><?= $ped->fecha ?></td>
            <td><?= $ped->hora ?></td>
            <td><?= Utils::showStatus($ped->estado) ?></td>
        </tr>
    <?php endwhile; ?>

</Table>