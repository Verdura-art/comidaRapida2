<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pedidos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$comida = $_POST['comida'];
$telefono = $_POST['telefono'];
$cantidad = $_POST['cantidad'];
 
// Insertar los datos en la tabla
$sql = "INSERT INTO ordenes (nombre, direccion, comida, telefono, cantidad)
VALUES ('$nombre', '$direccion', '$comida', '$telefono', $cantidad)";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Pedido registrado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
