<?php
require_once 'models/pedido.php';
class pedidoController
{
    public function pedido()
    {
        // echo 'controlador pedido, accion index';
        require_once 'views/pedido/pedido.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {
            $user = $_SESSION['identity'];
            $stats = Utils::statsCart();
            $costo = $stats['total'];


            $usuarioId = $user->id;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : false;


            if ($direccion && $contacto) {

                $pedido = new Pedido();
                $pedido->setUsuarioId($usuarioId);
                $pedido->setDireccion($direccion);
                $pedido->setContacto($contacto);
                $pedido->setCosto($costo);

                $save = $pedido->save();

                // guardar relaacion pedido
                $savePedido = $pedido->saveRelacion();

                if ($save && $savePedido) {
                    $_SESSION['pedido'] = 'Confirmado';
                } else {
                    $_SESSION['pedido'] = 'error';
                }
                // confirm
                header('Location:' . baseUrl . 'pedido/confirm');

                // echo '<pre>';
                // var_dump($pedido);
            } else {
                $_SESSION['pedido'] = 'fallo';
            }
        } else {
            // index
            header("Location:" . baseUrl);
        }
        // echo '<pre>';
        // var_dump($_SESSION['pedido']);
    }
 
    public function confirm()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];

            $pedido = new Pedido();
            $pedido->setUsuarioId($identity->id);

            $pedido = $pedido->getOneByUser();

            // echo '<pre>';
            // var_dump($pedido);

            $productoPedido = new Pedido();
            $productos = $productoPedido->getProduct($pedido->id);


        }
        require_once 'views/pedido/confirm.php'; 
    }

    public function misPedidos()
    {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        // Sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mispedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // obtener pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
            // var_dump($pedido);

            // obtener producot
            $productoPedido = new Pedido();
            $productos = $productoPedido->getProduct($id);

            // echo '<pre>';
            // var_dump($pedido);
            require_once 'views/pedido/detalle.php';
        } else {
            header('Location' . baseUrl . 'pedido/mispedidos.php');
        }
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mispedidos.php';
    }

    public function estado()
    {
        utils::isAdmin();

        if (isset($_POST['pedido_id']) && $_POST['estado']) {
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // actualizar estado
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header('Location:'.baseUrl.'pedido/detalle&id='.$id);
        } else {
            header('Location:' . baseUrl);
        }
    }

}
