<?php
if (!isset($_POST['usuario'])) {
    header("Location:Loginadmin.html");
}

$usuario = $_POST["usuario"];
$correo = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];



//consulta a la base de datos 

require_once ("CRUD/class/Consultas2.php");
$administradores = Usuarios::singleton();
$data = $administradores->Consulta($usuario, $correo, $contrasenia);

if (count($data) > 0) {
   
    foreach ($data as $fila) {
        $u = $fila["usuario"];
        session_start();
        $_SESSION['usuario'] = $u;
        $_SESSION['correo'] = $correo;
        $_SESSION['contrasenia'] = $contrasenia;
        $_SESSION['ok'] = "ok";
    }
} else {
    echo 'El usuario o contrasela es incorrecta';
}
?>