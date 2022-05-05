<?php
require_once 'models/productos.php';

class ProductoController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(4);
        // echo '<pre>';
        //         var_dump($productos->num_rows);
        // echo '<pre>';
        require_once 'views/productos/destacados.php';
    }

    public function ver()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();

            require_once 'views/productos/ver.php';
        } else {
            header('Location:' . baseUrl . 'producto/gestion');
        }
    }

    public function gestion()
    {
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/productos/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/productos/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            // echo '<pre>';
            // var_dump($_POST);
            // echo '</pre>';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            // $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;

            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

            if ($nombre && $descripcion && $precio && $stock /*&& $oferta*/ && $categoria) {
                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                // $producto->setOferta($oferta);

                $producto->setCategoriaId($categoria);

                // subir imagen
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);

                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }


                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }
        header('Location:' . baseUrl . 'producto/gestion');
    }

    public function editar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();


            require_once 'views/productos/crear.php';
        } else {
            header('Location:' . baseUrl . 'producto/gestion');
        }
    }



    public function eliminar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header('Location:' . baseUrl . 'producto/gestion');
    }

    public function update()
    {
        // echo "controller update";

        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();


            require_once 'views/productos/update.php';
        } else {
            header('Location:' . baseUrl . 'producto/gestion');
        }
    }

    public function updateProd()
    {
        Utils::isAdmin();

        if (isset($_POST)) {
            // echo '<pre>';
            // var_dump($_POST);
            // echo '</pre>';
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;

            if ($precio && $stock) {
                $producto = new Producto();

                $producto->setPrecio($precio);
                $producto->setStock($stock);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);

                    $save = $producto->update();
                }

                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }
        header('Location:' . baseUrl . 'producto/gestion');
    }

    public static function stock($id, $unidad)
    {
        Utils::isAdmin();


        if ($id && $unidad) {
            $producto = new Producto();

            $producto->setId($id);
            $producto->setStock($unidad);

            if (isset($id)) {
                $id = $id;
                $producto->setId($id);

                $save = $producto->updateStock();
            }

            if ($save) {
                $_SESSION['producto'] = 'complete';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }
    }
}
