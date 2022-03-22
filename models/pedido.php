<?php

class Pedido
{
    private $id;
    private $usuario_id;
    private $direccion;
    private $contacto;
    private $costo;
    private $estado;
    private $fecha;
    private $hora;
    private $db;


    public function __construct()
    {
        // conexion a la base de datos
        $this->db = Database::connect();
    }

    // id
    function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }
    function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUsuarioId($usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     */
    public function setDireccion($direccion): self
    {
        $this->direccion = $this->db->real_escape_string($direccion);

        return $this;
    }

    /**
     * Get the value of contacto
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set the value of contacto
     */
    public function setContacto($contacto): self
    {
        $this->contacto = $this->db->real_escape_string($contacto);

        return $this;
    }

    /**
     * Get the value of costo
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set the value of costo
     */
    public function setCosto($costo): self
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     */
    public function setHora($hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getAll()
    {
        $pedido = $this->db->query("SELECT * FROM pedido ORDER BY id DESC");
        return $pedido;
    }

    public function getOne()
    {
        $pedido = $this->db->query("SELECT * FROM pedido WHERE id = {$this->getId()}");

        return $pedido->fetch_object();

        // echo $pedido;
        // echo $this->db->error;
        // die();
    }
    public function getOneByUser()
    {
        $sql = "SELECT pedido.id, pedido.costo FROM pedido 
                INNER JOIN detalle_pedido ON detalle_pedido.pedido_id = pedido.id
                WHERE pedido.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC LIMIT 1";

        $pedido = $this->db->query($sql);

        return $pedido->fetch_object();

        // echo $sql;
        // echo $this->db->error;
        // die();
    }

    public function getProduct($id)
    {
        // $sql = "SELECT * FROM producto 
        //         WHERE id IN(SELECT producto_id FROM detalle_pedido WHERE pedido_id = {$id})";

        $sql = "SELECT producto.*, detalle_pedido.unidades FROM producto
                INNER JOIN detalle_pedido ON producto.id = detalle_pedido.producto_id
                WHERE detalle_pedido.pedido_id = {$id}
        ";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedido p
        WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC";

        $pedido = $this->db->query($sql);

        return $pedido;

        // echo $sql;
        // echo $this->db->error;
        // die();
    }


    public function save()
    {
        $sql = "INSERT INTO pedido VALUES(null,
                                            '{$this->getUsuarioId()}',
                                            '{$this->getDireccion()}',
                                            '{$this->getContacto()}',
                                            {$this->getCosto()},
                                            'confirmado',
                                            CURDATE(),
                                            CURTIME()

                                            );";
        $save = $this->db->query($sql);

        /*depurar el codigo, corregir erroes de carga
        echo $sql;
        echo "<br>";
        echo $this->db->error;
        die();*/


        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function saveRelacion()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);

        $pedidoId = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $indice => $valor) {

            $producto = $valor['producto'];


            $insert = "INSERT INTO detalle_pedido VALUES(NULL, 
                                                        {$pedidoId}, 
                                                        {$producto->id},   
                                                        {$valor['unidad']})";


            $save = $this->db->query($insert);

            // correccion de errores
            // echo '<pre>';
            // var_dump($producto);
            // var_dump($insert);
            // echo $this->db->error;
            // die();
        }

        // echo '<pre>';
        // var_dump($pedidoId);


        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE pedido SET estado='{$this->getEstado()}' 
                WHERE id={$this->getId()};";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

}
