<h1>Algunos de nuestros productos</h1>

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
            <?php if ($product->stock < 0) : ?>
                <s>
                    <p>$<?= number_format($product->precio, 2, ',', '.') ?></p>
                </s>
            <?php endif; ?>
        <?php endif; ?>

        <p>
            <?php if ($product->stock > 0) : ?>
                Stock: <span style="color:green"><?= $product->stock ?></span>
                <?php if (isset($_SESSION['indentity'])) : ?>
                    <?php if (!isset($_SESSION['admin']) && $product->stock > 0) : ?>
                        <a href="<?= baseUrl ?>/carrito/add&id=<?= $product->id ?>">Comprar</a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else : ?>
        <p style="color:red;">Producto no disponible</p>
    <?php endif; ?>

    <?php if (isset($_SESSION['admin'])) : ?>
        <a href="<?= baseUrl ?>producto/update&id=<?= $product->id ?>" class="button buy">modificar</a>
    <?php else : ?>
        <?php if (!isset($_SESSION['admin']) && $product->stock > 0) : ?>
            <a href="<?= baseUrl ?>carrito/add&id=<?= $product->id ?>" >
            <button class="btn">Agregar a carrito</button></a>
        <?php endif; ?>
        
    <?php endif; ?>


    </p>



    </div>

<?php endwhile; ?>