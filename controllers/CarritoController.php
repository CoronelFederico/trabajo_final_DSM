<?php
require_once 'models/productos.php';
class carritoController
{
    public function index()
    {
        // echo '<pre>';
        // var_dump($_SESSION['carrito']);
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }

        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . baseUrl);
        }


        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            // aumento de unidades
            foreach ($_SESSION['carrito'] as $indice => $valor) {
                if ($valor['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidad']++;
                    $contador++;
                }
            }
        }

        if (!isset($contador) || $contador == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidad" => 1,
                    "producto" => $producto
                );
            }
            $_SESSION['carrito'];
        }
        header('Location:' . baseUrl . 'carrito/index');
    }
    public function delete()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];

            unset($_SESSION['carrito'][$index]);
            header('Location:' . baseUrl . 'carrito/index');
        }
    }
    public function deleteAll()
    {
        unset($_SESSION['carrito']);
        header('Location:' . baseUrl . 'carrito/index');
    }

    public function deleteAllPedido()
    {
        unset($_SESSION['carrito']);
        header('Location:' . baseUrl . 'pedido/misPedidos');
    }

    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];

            $_SESSION['carrito'][$index]['unidad']++;
        }
        header('Location:' . baseUrl . 'carrito/index');
    }

    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];

            $_SESSION['carrito'][$index]['unidad']--;

            if ($_SESSION['carrito'][$index]['unidad'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        header('Location:' . baseUrl . 'carrito/index');
    }
}
