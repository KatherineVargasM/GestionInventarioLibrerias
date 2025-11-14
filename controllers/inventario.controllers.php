<?php
error_reporting(0);
require_once('../config/sesiones.php');
require_once("../models/inventario.models.php");
$Inventario = new inventario;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Inventario->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $id_inventario = $_POST["id_inventario"];
        $datos = $Inventario->uno($id_inventario);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $id_libro = $_POST["id_libro"];
        $stock = $_POST["stock"];
        $ubicacion = $_POST["ubicacion"];
        $datos = $Inventario->Insertar($id_libro, $stock, $ubicacion);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $id_inventario = $_POST["id_inventario"];
        $stock = $_POST["stock"];
        $ubicacion = $_POST["ubicacion"];
        $datos = $Inventario->Actualizar($id_inventario, $stock, $ubicacion);
        echo json_encode($datos);
        break;
    case 'librosSinInventario':
        $datos = array();
        $datos = $Inventario->librosSinInventario();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
}
?>