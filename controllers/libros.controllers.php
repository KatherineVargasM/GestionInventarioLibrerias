<?php
error_reporting(0);
require_once('../config/sesiones.php');
require_once("../models/libros.models.php");
$Libros = new libros;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Libros->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $id_libro = $_POST["id_libro"];
        $datos = $Libros->uno($id_libro);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $titulo = $_POST["titulo"];
        $isbn = $_POST["isbn"];
        $año = $_POST["año"];
        $id_autor = $_POST["id_autor"];
        $datos = $Libros->Insertar($titulo, $isbn, $año, $id_autor);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $id_libro = $_POST["id_libro"];
        $titulo = $_POST["titulo"];
        $isbn = $_POST["isbn"];
        $año = $_POST["año"];
        $id_autor = $_POST["id_autor"];
        $datos = $Libros->Actualizar($id_libro, $titulo, $isbn, $año, $id_autor);
        echo json_encode($datos);
        break;
}
?>