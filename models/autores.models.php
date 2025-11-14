<?php
require_once('../config/conexion.php');

class autores
{
    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM autores";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function uno($id_autor){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM autores WHERE id_autor = $id_autor";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function Insertar($nombre_apellido, $nacionalidad){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO autores(nombre_apellido, nacionalidad) VALUES ('$nombre_apellido', '$nacionalidad')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }

    public function Actualizar($id_autor, $nombre_apellido, $nacionalidad){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE autores SET nombre_apellido='$nombre_apellido', nacionalidad='$nacionalidad' WHERE id_autor= $id_autor";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }

    public function Eliminar($id_autor){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM autores WHERE id_autor = $id_autor";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return false;
        }
        $con->close();
    }
}
?>