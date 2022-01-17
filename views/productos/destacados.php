<h1>Algunos de nuestros productos</h1>

<?php while ($product = $productos->fetch_object()) : ?>

    <div class="product">
        <?php if($product->imagen != null):?>
            <img src="<?=baseUrl?>/uploads/images/<?=$product->imagen;?>" />
        <?php else:?>
            <img src="<?=baseUrl?>/uploads/images/imagen-no-disponible.gif" />
        <?php endif?>
            <h2><?=$product->nombre;?></h2>
            <p>$<?=number_format($product->precio,2,',','.')?></p>
            <p>Stock: <?=$product->stock;?></p>
            <a href="" class="button buy">Comprar</a>
    </div>

<?php endwhile; ?>