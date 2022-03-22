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
            $id = $_GET['id'];
            // conseguir categorias
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            //Conseguir productos  
            $productos = new Producto();
            $productos->setCategoriaId($id);
            $productos = $productos->getAllCategory();
        }

        require_once 'views/categoria/ver.php';
    }

    public function delete()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $category = new Categoria();
            $category->setId($id);

            $delete = $category->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header('Location:' . baseUrl . 'categoria/index');
    }
}
