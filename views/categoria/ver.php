<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre; ?></h1>

    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>

    <?php else : ?>
        <?php while ($product = $productos->fetch_object()) : ?>

            <div class="product">

                <!-- <h5 class="oferta">
                        <?php if ($product->oferta != 0) : ?>
                            Producto en oferta
                        <?php endif; ?>
                    </h5> -->
                <a href="<?= baseUrl ?>producto/ver&id=<?= $product->id ?>">
                    <?php if ($product->imagen != null) : ?>
                        <img src="<?= baseUrl ?>/uploads/images/<?= $product->imagen; ?>" />
                    <?php else : ?>
                        <img src="<?= baseUrl ?>/uploads/images/imagen-no-disponible.gif" />
                    <?php endif ?>
                    <h2><?= $product->nombre; ?></h2>
                </a>
                <?php if (isset($_SESSION['identity'])) : ?>
                    <p>$<?= number_format($product->precio, 2, ',', '.') ?></p>
                <?php endif; ?>

                <?php if ($product->stock > 0) : ?>
                    Stock: <span style="color:green"><?= $product->stock ?></span>
                <?php else : ?>
                    <p style="color:red;">Producto no disponible</p>
                <?php endif; ?>

                <?php if (isset($_SESSION['admin'])) : ?>
                    <a href="<?= baseUrl ?>producto/update&id=<?= $product->id ?>" class="button_slide slide_left">modificar</a>
                <?php else : ?>
                    <?php if (!isset($_SESSION['admin']) && $product->stock > 0) : ?>
                        <a href="<?= baseUrl ?>carrito/add&id=<?= $product->id ?>" class="button_slide slide_left">Agregar a carrito</a>
                    <?php endif; ?>
                <?php endif; ?>

                </p>


            </div>

        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>CATEGORIA NO ENCOTRADA</h1>
<?php endif; ?>