<?php
// Permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permitir los métodos GET, POST, PUT, DELETE, OPTIONS
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Permitir los encabezados "Content-Type" y "Authorization"
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Permitir incluir cookies en las solicitudes
header("Access-Control-Allow-Credentials: true");

function conexion()
{
    // Definición de las credenciales de la base de datos
    $servername = "127.0.0.1";  // Nombre del servidor de la base de datos (generalmente localhost si está en el mismo servidor)
    $username = "root";  // Nombre de usuario de la base de datos
    $password = "";  // Contraseña de la base de datos
    $dbname = "ventas_db";  // Nombre de la base de datos que deseas utilizar
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

// Crear una conexión a la base de datos
$conn = conexion();

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    // Si hay un error en la conexión, se muestra un mensaje de error y se termina la ejecución del script
    die("Conexión fallida: " . $conn->connect_error);
}

