<?php
require 'db.php';  // Asegúrate de que el path al archivo de conexión es correcto

$sql = "SELECT Idusuarios, Nombre, usuario, correo, contraseña FROM usuarios";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo "0 results";
}

$conn->close();
?>