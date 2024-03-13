<?php
// Verifica si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.html');
    exit;
}

// Conexión a la base de datos
$servername = "localhost";
$username = "nombre_usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para recuperar los productos
$sql = "SELECT id, nombre_producto FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los productos
    while($row = $result->fetch_assoc()) {
        echo "<p>ID: " . $row["id"]. " - Nombre: " . $row["nombre_producto"]. "</p>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
