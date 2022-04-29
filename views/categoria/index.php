<h1>Gestionar categorias</h1>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong style="color:green">La categoría fue eliminada correctamente.</strong>
    <script>
        VanillaToasts.create({
            title: 'Welcome to my site',
            text: 'This toast will hide after 5000ms or when you click it',
            type: 'warning', // success, info, warning, error   / optional parameter
            icon: '/img/alert-icon.jpg', // optional parameter
            timeout: 5000 // hide after 5000ms, // optional parameter
        });
    </script>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong style="color:red">La categoría no fue eliminada. No olvides que para eliminar una categoría, la misma no debe contener ningún producto asociado.</i>
    </strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<a href="<?= baseUrl ?>categoria/crear" class="button_slide slide_right">Crear categoria</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>Eliminar</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr class="animate__animated animate__lightSpeedInLeft">
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
            <td>
                <a href="<?= baseUrl ?>categoria/delete&id=<?= $cat->id ?>" class="button_slide slide_down button_red" />
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>