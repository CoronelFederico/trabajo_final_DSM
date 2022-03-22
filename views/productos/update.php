<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Modificar producto: <i><?= $pro->nombre; ?></i></h1>
    <?php $url_action = baseUrl . 'producto/updateProd&id=' . $pro->id; ?>
<?php endif; ?>

<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

    <label for="precio">Precio del producto</label>
    <input type="number" name="precio" id="precio" placeholder="$" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

    <label for="stock">Stock disponible del producto: <b><?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?></b></label>

    <label for="stock">Agregar nueva cantidad de productos:</label>

    <!-- <input type="number" name="stock" id="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?> palceholder:"> -->
    <input type="number" name="stock" id="stock" placeholder="0" title="Agregar cantidad de producto a actualizar. Por ejemplo: 15, el sistema incrementara con lo que haya en la base de datos. Y sumara el nuevo total.">
    <label>Si no debe agregar ningun stock al producto agregue "00" al bloque de arriba</label>

    <input type="submit" value="Actualizar nuevo producto" class="button">
</form>

<script>


    alertify.alert('ㅤㅤ<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg> Como actualizar al producto: <?= $pro->nombre?> ',
    '-Para actualizar el precio modificar el que ya esta establecido.'
    +'<br>-Para no actualizar el precio <b>NO</b> modificar el que ya esta establecido.'
    +'<br>-Para modificar el stock agregar la nueva cantidad de unidades.'
    +'<br><i>(El sistema hará la incrementacion basandose con la base de datos)</i>.'
    +'<br>-Si no se desea modificar el stock pero <b>SI</b> el precio al bloque de "agregar nueva cantidad de productos" introducir <u><b>00</b></u>.'
    , 
    function(){ alertify.success('Actualizacion a <?= $pro->nombre?>'); });
</script>
