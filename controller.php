<?php

require_once 'conexion.php';

class AccionesCRUD
{
    private $conexionDB;

    public function __construct()
    {
        $this->conexionDB = new Conexion();
    }

    public function registrarProducto($datosProductos)
    {
        try {
            $sql = "INSERT INTO productos (nombre, marca, numPlaca, responsable, observacion) 
                    VALUES (:nombre, :marca, :numPlaca, :responsable, :observacion)";
            $stmt = $this->conexionDB->connection->prepare($sql);
            $stmt->bindParam(':nombre', $datosProductos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':marca', $datosProductos['marca'], PDO::PARAM_STR);
            $stmt->bindParam(':numPlaca', $datosProductos['numPlaca'], PDO::PARAM_STR);
            $stmt->bindParam(':responsable', $datosProductos['responsable'], PDO::PARAM_STR);
            $stmt->bindParam(':observacion', $datosProductos['observacion'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error al registrar el producto: " . $e->getMessage());
        }
    }

    public function obtenerProductos()
    {
        try {
            $sql = "SELECT * FROM productos";
            $stmt = $this->conexionDB->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener los productos: " . $e->getMessage());
        }
    }

    public function obtenerProductosId($id)
    {
        try {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->conexionDB->connection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener el producto: " . $e->getMessage());
        }
    }

    public function actualizarProductos($id, $datosProductos)
    {
        try {
            $sql = "UPDATE productos SET nombre = :nombre, marca = :marca, numPlaca = :numPlaca, 
                responsable = :responsable, observacion = :observacion WHERE id = :id";
            $stmt = $this->conexionDB->connection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $datosProductos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':marca', $datosProductos['marca'], PDO::PARAM_STR);
            $stmt->bindParam(':numPlaca', $datosProductos['numPlaca'], PDO::PARAM_STR);
            $stmt->bindParam(':responsable', $datosProductos['responsable'], PDO::PARAM_STR);
            $stmt->bindParam(':observacion', $datosProductos['observacion'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error al actualizar el producto: " . $e->getMessage());
        }
    }


    public function eliminarProducto($id)
    {
        try {
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $this->conexionDB->connection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error al eliminar el producto: " . $e->getMessage());
        }
    }
    public function buscarProducto($busqueda)
    {
        try {
            $sql = "SELECT * FROM productos WHERE nombre LIKE :busqueda OR marca LIKE :busqueda";
            $stmt = $this->conexionDB->connection->prepare($sql);
            $searchTerm = '%' . $busqueda . '%';  // Se utiliza comodines para buscar coincidencias parciales
            $stmt->bindParam(':busqueda', $searchTerm, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al buscar productos: " . $e->getMessage());
        }
    }
}
