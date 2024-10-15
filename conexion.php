<?php

class Conexion
{
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost; dbname=Inventarioy12", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die("Error al conectar con la base de datos " . $error->getMessage());
        }
    }

    public function obtenerConexion()
    {
        return $this->connection;
    }
}
