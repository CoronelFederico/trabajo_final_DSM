   
      <div class="login">
        <?php if (!isset($_SESSION['identity'])) : ?>
        <h1>Bienvenido</h1>
        <h4>
          <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] = "identificaion fallida") : ?>
          <h5 style="color: red">
            El correo electrónico o contraseña que ingresaste no está
            relacionada a nuestra base de datos. Comprueba datos ingresados.
          </h5>
          <?php endif; ?>
          <?php Utils::deleteSession('error_login'); ?>
        </h4>

        <form
          id="formulario"
          action="<?= baseUrl ?>usuario/login"
          method="post"
        >
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Ingresar nombre"
          />
          <input
            type="password"
            name="password"
            id=""
            placeholder="Ingresar contraseña"
          />
          <input type="submit" class="button" value="Ingresar" />
        </form>

        <?php else : ?>
        <h1 style="text-transform: uppercase">
          <?= $_SESSION['identity']->nombre ?>
          <?= $_SESSION['identity']->apellidos ?>
        </h1>
        <?php endif; ?>

        <ul class="activities">
          <?php if (isset($_SESSION['admin'])) : ?>
          <li>
            <a href="<?= baseUrl ?>categoria/index">Gestionar categorias</a>
          </li>
          <li>
            <a href="<?= baseUrl ?>producto/gestion">Gestionar productos</a>
          </li>
          <!-- <li><a href="<?= baseUrl ?>producto/update">Actualizar producto</a></li> -->
          <li><a href="<?= baseUrl ?>pedido/gestion">Gestionar pedidos</a></li>
          <?php endif; ?>

          <?php if (isset($_SESSION['identity'])) : ?>

          <?php if (!isset($_SESSION['admin'])) : ?>
          <li><a href="<?= baseUrl ?>pedido/mispedidos">Mis pedidos</a></li>
          <?php endif; ?>

          <li><a href="<?= baseUrl ?>usuario/logout">Cerrar sesion</a></li>

          <?php else : ?>
          <div class="not-count">
            <label for="">¿No tienes una cuenta? </label>
            <a class="button_register" href="<?= baseUrl ?>usuario/registro">Registrate ahora</a>
          </div>
          <?php endif; ?>
        </ul>
      </div>
    </aside>

    <article class="main">
    <div class="carrito">
        <ul>
				<?php $stats = Utils::statsCart(); ?>
          <li class="button_slide_none">Productos:(<?= $stats['count'] ?>)</li>
          <hr />
          <li class="button_slide_none">Total a pagar:($<?= $stats['total'] ?>)</li>
          <hr />
          <li><a href="<?= baseUrl ?>carrito/index" class="button_slide slide_diagonal">Ir a mi carrito</a></li>
        </ul>
      </div>
      <hr class="categoria" />