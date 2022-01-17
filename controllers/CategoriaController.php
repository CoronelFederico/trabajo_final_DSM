<?php
require_once 'models/categoria.php';
require_once 'models/productos.php';

class categoriaController
{
    public function index()
    {
        Utils::isAdmin();

        $categoria = new Categoria;
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function crear()
    {

        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {

            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }

        header('Location:' . baseUrl . 'categoria/index');
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            // echo '<pre>';
            // var_dump($_GET['id']);
            $id = $_GET['id'];
// conseguir categorias
            $categoria = new categoria();
            $categoria->setId($id);

            $categoria = $categoria->getOne();

            // var_dump($categorias);
//Conseguir productos  
            $productos=new Producto();
            $productos->setCategoriaId($id);

            $productos = $productos->getAllCategory();

        }

        require_once 'views/categoria/ver.php';
    }
}
