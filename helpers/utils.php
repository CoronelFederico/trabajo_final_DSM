<?php

class Utils
{
    public static function deleteSession($name)
    {

        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) { 
            header('Location:' . baseUrl);
        } else {
            return true;
        }
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header('Location:' . baseUrl);
        } else {
            return true;
        }
    }

    public static function showCategorias()
    {
        require_once 'models/categoria.php';

        $categoria = new Categoria;
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function statsCart()
    {
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        
        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);
            
            foreach ($_SESSION['carrito'] as $indice => $valor) {
                $stats['total'] += $valor['precio'] * $valor['unidad'];
            }
        }
        return $stats;
    }

    public static function showStatus($status)
    {
        $value = $status;

        if ($value == 'confirmado') {
            $value = 'Pedido confirmado.';
        } elseif ($value == 'pending') {
            $value = 'Pendiente a recibir el pago.';
        } elseif ($value == 'preparation') {
            $value = 'Recibimos tu pago. Estamos preparando tu pedido...';
        } elseif ($value == 'deliver') {
            $value = 'Hemos entregado tu pedido.';
        }

        return $value;
    }
}
 