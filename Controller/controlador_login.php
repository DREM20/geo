<?php
session_start();
if(!empty($_POST["btningresar"])){
    if(!empty($_POST["usuario"]) and !empty($_POST["password"])){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$password'";
        $result=$conn->query($sql);
        if($datos=$result->fetch_object()) {
            
            $_SESSION["id"] = $datos->id;
$_SESSION["nombre"] = $datos->nombres;
$_SESSION["apellido"] = $datos->apellidos;
            header("location: inicio.php");
        }
        else{
            echo "<div clas='alert alert-danger'>acceso denegado</div>";
        }

    }else{
        echo "campos vacios";
    }
}
