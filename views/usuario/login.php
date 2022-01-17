<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="<?= baseUrl ?>usuario/login" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese su email" required title="Este campo debe ser completado en su totalidad" />
          <label class="form-label" for="email">Correo electronico</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Ingresar su contraseña" required title="Este campo debe ser completado en su totalidad" />
          <label class="form-label" for="password">Contraseña</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked />
              <label class="form-check-label" for="form2Example3"> Recordar mi contraseña </label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!">Olvidé mi contraseña</a>
          </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Ingresar</button>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>