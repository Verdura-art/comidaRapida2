<?php
// Conexión a la base de datos usando MySQLi
$servername = "localhost";
$username = "root";         // Usuario de MySQL
$password = "";             // Contraseña de MySQL (vacía por defecto en XAMPP)
$dbname = "pedidos  ";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los pedidos
$sql = "SELECT nombre, direccion, comida, telefono, cantidad, fecha_pedido FROM pedidos ORDER BY fecha_pedido DESC";
$result = $conn->query($sql);

// Almacenar los resultados en un array
$pedidos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($pedidos);

// Cerrar la conexión
$conn->close();
?>
