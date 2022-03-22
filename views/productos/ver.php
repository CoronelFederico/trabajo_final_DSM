<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
    <div id="detail-product">
        <?php if ($pro->imagen != null) : ?>
            <img class="image" src="<?= baseUrl ?>/uploads/images/<?= $pro->imagen; ?>" />
        <?php else : ?>
            <img src="<?= baseUrl ?>/uploads/images/imagen-no-disponible.gif" />
        <?php endif ?>

        <!-- <h3 class="oferta">
                <?php if ($pro->oferta != 0) : ?>
                    Producto en oferta
                <?php endif; ?>
            </h3> -->

        <p class="description"><?= $pro->descripcion ?></p>

        <?php if (isset($_SESSION['identity'])) : ?>
            <?php if ($pro->stock != 0) : ?>
               <s> <p>$<?= number_format($pro->precio, 2, ',', '.') ?></p></s>
            <?php endif; ?>
        <?php endif; ?>


        <h2>
            <?php if ($pro->stock >= 0) : ?>
                <?= $pro->stock ?>
                <?php if (isset($_SESSION['identity'])) : ?>
                    <?php if (!isset($_SESSION['admin'])) : ?>
                        <a href="<?= baseUrl ?>/carrito/add&id=<?= $pro->id ?>" id="button" class="btn-move">Comprar</a>
                    <?php endif; ?>

                <?php endif; ?>
            <?php else : ?>
                Producto no disponible
            <?php endif; ?>
        </h2>



    <?php else : ?>
        <h1>PRODUCTO NO ENCOTRADO</h1>
    <?php endif; ?>