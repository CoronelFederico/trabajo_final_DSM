<?php

class Producto
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
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


    // categoriaId
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);

        return $this;
    }
    // nombre
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }
    // descripcion
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }
    // precio
    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }
    // stock
    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }
    // oferta
    public function getOferta()
    {
        return $this->oferta;
    }

    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

    // fecha
    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
    // imagen
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
    
    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM producto ORDER BY id ASC");
        return $productos;
    }

    public function getAllCategory()
    {
        $sql = "SELECT p.*,c.nombre FROM producto p"
                . "INNER JOIN categoria c ON c.id = p.categoria_id"
                . "WHERE p.categoria_id = {$this->getCategoriaId()}"
                . "ORDER BY id ASC";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM producto WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

    public function getRandom($limit)
    {
        $productos = $this->db->query("SELECT * FROM producto ORDER BY RAND() LIMIT $limit");
        return $productos;
    }
    public function save()
    {
        $sql = "INSERT INTO producto VALUES(null,
                                            '{$this->getCategoriaId()}',
                                            '{$this->getNombre()}',
                                            '{$this->getDescripcion()}',
                                            '{$this->getPrecio()}',
                                            '{$this->getStock()}',
                                            '{$this->getOferta()}',
                                            CURDATE(),
                                            '{$this->getImagen()}'
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

    public function delete()
    {
        $sql = "DELETE FROM producto WHERE id = {$this->id}";

        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE producto SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()},oferta={$this->getOferta()}, categoria_id={$this->getCategoriaId()}  ";

        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }

        $sql .= " WHERE id={$this->id};";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
