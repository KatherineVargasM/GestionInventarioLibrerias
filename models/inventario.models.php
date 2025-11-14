<?php
require_once('../config/conexion.php');
class inventario
{
    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT I.id_inventario, I.stock, I.ubicacion, L.titulo, A.nombre_apellido as autor_nombre
                   FROM inventario I
                   INNER JOIN libros L ON I.id_libro = L.id_libro
                   INNER JOIN autores A ON L.id_autor = A.id_autor";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    
    public function uno($id_inventario){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT I.*, L.titulo 
                   FROM inventario I
                   INNER JOIN libros L ON I.id_libro = L.id_libro
                   WHERE I.id_inventario = $id_inventario";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function Insertar($id_libro, $stock, $ubicacion){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO inventario(id_libro, stock, ubicacion) 
                   VALUES ($id_libro, $stock, '$ubicacion')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar el stock';
        }
        $con->close();
    }

    public function Actualizar($id_inventario, $stock, $ubicacion){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE inventario 
                   SET stock=$stock, ubicacion='$ubicacion' 
                   WHERE id_inventario = $id_inventario";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el stock';
        }
        $con->close();
    }

    public function librosSinInventario()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM libros 
                   WHERE id_libro NOT IN (SELECT id_libro FROM inventario)";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
}
?>