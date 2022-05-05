<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar producto <?= $pro->nombre; ?></h1>
    <?php $url_action = baseUrl . 'producto/save&id=' . $pro->id; ?>
<?php else : ?>
    <h1>Cargar un nuevo producto </h1>
    <?php $url_action = baseUrl . 'producto/save'; ?>
<?php endif; ?>


<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data" class="product">

    <label for="nombre">Nombre del producto</label>
    <input type="text" name="nombre" id="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

    <label for="descripcion">Descripcion del producto</label>
    <textarea name="descripcion" id="descripcion"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

    <label for="precio">Precio del producto</label>
    <input type="number" name="precio" id="precio" placeholder="$" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">


    <label for="stock">Stock del producto</label>
    <input type="number" name="stock" id="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

    <label for="imagen">Imagen del producto</label>
    <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
        <img src="<?= baseUrl ?>uploads/images/<?= $pro->imagen ?>" alt="<?= $pro->imagen ?>" class="thumb">
    <?php endif; ?>
    <input type="file" name="imagen" id="imagen">

    <label for="categoria">Categoria que pertenece el producto</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" id="categoria" value="">
        <option>--Seleccionar una categoria--</option>
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>

    <input type="submit" value="Cargar nuevo producto" class="button">
</form>