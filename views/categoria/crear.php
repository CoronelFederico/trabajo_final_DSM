<h1>Crear nueva categoria</h1>

<form action="<?=baseUrl?>categoria/save" method="POST">
    <label for="nombre">Nombre de la categoria</label>
    <input type="text" name="nombre" id="nombre" required>

    <input type="submit" value="Guardar nueva categoria" class="button">
</form> 