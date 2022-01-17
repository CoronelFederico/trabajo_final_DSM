<?php

class Categoria
{
    private $id;
    private $nombre;
    private $db;


    public function __construct()
    {
        // conexion a la base de datos
        $this->db = Database::connect();
    }


    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categoria ORDER BY id ASC;");
        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO categoria VALUES(null,'{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function getOne(){
        $categorias = $this->db->query("SELECT * FROM categoria WHERE id={$this->getId()};");
        return $categorias->fetch_object();
    }
}