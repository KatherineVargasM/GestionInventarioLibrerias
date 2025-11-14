<?php
error_reporting(0);
require_once('../config/sesiones.php');
require_once("../models/autores.models.php");

$Autores = new autores;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Autores->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $id_autor = $_POST["id_autor"];
        $datos = $Autores->uno($id_autor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $nombre_apellido = $_POST["nombre_apellido"];
        $nacionalidad = $_POST["nacionalidad"];
        $datos = $Autores->Insertar($nombre_apellido, $nacionalidad);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $id_autor = $_POST["id_autor"];
        $nombre_apellido = $_POST["nombre_apellido"];
        $nacionalidad = $_POST["nacionalidad"];
        $datos = $Autores->Actualizar($id_autor, $nombre_apellido, $nacionalidad);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $id_autor = $_POST["id_autor"];
        $datos = $Autores->Eliminar($id_autor);
        echo json_encode($datos);
        break;
}
?>