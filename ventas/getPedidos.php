<?php

// Permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permitir los métodos GET, POST, PUT, DELETE, OPTIONS
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Permitir los encabezados "Content-Type" y "Authorization"
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Permitir incluir cookies en las solicitudes
header("Access-Control-Allow-Credentials: true");
require 'C:\xampp\htdocs\abisoft\conexion.php';

$sql = "SELECT * from Pedidos";

if ($query = mysqli_query($conn, $sql)) {
    while ($resultado = mysqli_fetch_assoc($query)) {
        $datos[] = $resultado;
    }
    echo json_encode(array("status" => "sucess", "code" => 1, "document" => $datos));
} else {
    echo json_encode(array("status" => "error", "code" => 0, "document" => $datos));
}
