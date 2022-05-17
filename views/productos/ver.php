<?php if (isset($pro)) : ?>
    <h1 class="title"><?= $pro->nombre ?></h1>
    <div class="detail-product">
        <?php if ($pro->imagen != null) : ?>
            <img class="image" src="<?= baseUrl ?>/uploads/images/<?= $pro->imagen; ?>" />
        <?php else : ?>
            <img src="<?= baseUrl ?>/uploads/images/imagen-no-disponible.gif" />
        <?php endif ?>
        <div class="card">


            <!-- <h3 class="oferta">
                <?php if ($pro->oferta != 0) : ?>
                    Producto en oferta
                <?php endif; ?>
            </h3> -->
            <h4>Descripción del producto</h4>
            <p class="description"><?= $pro->descripcion ?></p>


            <p>

            <?php if (isset($_SESSION['identity'])) : ?>
                <?php if ($pro->stock != 0) : ?>
                    <h4>Precio del producto</h4>
                    <p>$<?= number_format($pro->precio, 2, ',', '.') ?></p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($pro->stock >= 0) : ?>
                <p><strong>Unidad disponible:</strong> <?= $pro->stock ?></p>
                <?php if (isset($_SESSION['identity'])) : ?>
                    <?php if (!isset($_SESSION['admin'])) : ?>
                        <a class="button_slide slide_left" href="<?= baseUrl ?>carrito/add&id=<?= $pro->id ?>  ">Agregar a carrito</a>
                    <?php endif; ?>

                <?php endif; ?>
            <?php else : ?>
                Producto no disponible
            <?php endif; ?>
            </p>



        </div>

    <?php else : ?>
        <h1>PRODUCTO NO ENCOTRADO</h1>
    <?php endif; ?>