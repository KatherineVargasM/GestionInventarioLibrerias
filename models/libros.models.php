<?php
require_once('../config/conexion.php');
class libros
{
    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT L.id_libro, L.titulo, L.isbn, L.año, A.nombre_apellido as autor_nombre 
                   FROM libros L
                   INNER JOIN autores A ON L.id_autor = A.id_autor";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function uno($id_libro){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM libros WHERE id_libro = $id_libro";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function Insertar($titulo, $isbn, $año, $id_autor){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO libros(titulo, isbn, año, id_autor) 
                   VALUES ('$titulo', '$isbn', $año, $id_autor)";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar el libro';
        }
        $con->close();
    }

    public function Actualizar($id_libro, $titulo, $isbn, $año, $id_autor){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE libros 
                   SET titulo='$titulo', isbn='$isbn', año=$año, id_autor=$id_autor 
                   WHERE id_libro= $id_libro";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el libro';
        }
        $con->close();
    }
}
?>