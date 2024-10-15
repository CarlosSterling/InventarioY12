<?php
require_once 'controller.php';

$accion = new AccionesCRUD();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosProductos = [
                'nombre' => $_POST['nombre'],
                'marca' => $_POST['marca'],
                'numPlaca' => $_POST['numPlaca'],
                'responsable' => $_POST['responsable'],
                'observacion' => $_POST['observacion']
            ];
            $accion->registrarProducto($datosProductos);
            header('Location: index.php');
            exit();
        }
        include 'Views/create.php';
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $datosProductos = [
                'nombre' => $_POST['nombre'],
                'marca' => $_POST['marca'],
                'numPlaca' => $_POST['numPlaca'],
                'responsable' => $_POST['responsable'],
                'observacion' => $_POST['observacion']
            ];
            $accion->actualizarProductos($id, $datosProductos);
            header('Location: index.php');
            exit();
        } elseif (isset($_GET['id'])) {
            $registro = $accion->obtenerProductosId($_GET['id']);
            include 'Views/update.php';
        }
        break;


    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $accion->eliminarProducto($id);
            header('Location: index.php');
            exit();
        }
        break;

    case 'search':  
        if (isset($_GET['buscar'])) {
            $busqueda = $_GET['buscar'];
            $datos = $accion->buscarProducto($busqueda);  
            include 'Views/read.php';  
        }
        break;

    default:
        $datos = $accion->obtenerProductos();
        include 'Views/read.php';
        break;
}
