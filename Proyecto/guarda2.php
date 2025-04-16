<?php
    $nombre=$_POST["nombre"];
    $usuario=$_POST["usuario"];
    $correo=$_POST["correo"];
    $contrasenia=$_POST["contrasenia"];
    require_once("CRUD/class/Consultas2.php");
    $administradores = Usuarios::singleton();
    $data = $administradores->insertar($nombre, $usuario, $correo, $contrasenia);
?>