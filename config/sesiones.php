<?php
session_start();
class Sesiones
{
    public function __construct(){
        if (empty($_SESSION["idUsuarios"])) {
            header("Location:../login.php");
        }
    }
}

if (isset($_GET["op"]) && $_GET["op"] == "salir") {
    session_destroy();
    header("Location:../login.php");
}
?>