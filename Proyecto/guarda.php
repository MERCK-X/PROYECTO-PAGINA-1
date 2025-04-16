<?php
    $nombre=$_POST["nombre"];
    $usuario=$_POST["usuario"];
    $correo=$_POST["correo"];
    $contrasenia=$_POST["contrasenia"];
    require_once("CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();
    $data = $usuarios->insertar($nombre, $usuario, $correo, $contrasenia);
?>