<?php
// Conexión a la base de datos usando MySQLi
$servername = "localhost";  // Dirección del servidor
$username = "root";         // Usuario de MySQL (por defecto es root para XAMPP)
$password = "";             // Contraseña de MySQL (vacía por defecto para XAMPP)
$dbname = "pedidos";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los elementos del menú
$sql = "SELECT nombre, descripcion, precio, imagen FROM menu";
$result = $conn->query($sql);

// Almacenar los resultados en un array
$menu_items = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($menu_items);

// Cerrar la conexión
$conn->close();
?>

