<?php

// Permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permitir los métodos GET, POST, PUT, DELETE, OPTIONS
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Permitir los encabezados "Content-Type" y "Authorization"
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Permitir incluir cookies en las solicitudes
header("Access-Control-Allow-Credentials: true");
require ("../conexion.php"); // importa el archivo de la conexion a la BD

$con = conexion();



// Eliminar detalles del pedido
$query = "DELETE FROM detalles_pedido WHERE id_pedido =" . $_GET['id_pedido'];


if (mysqli_query($con, $query)) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error"));
}

//check post request          

$sql = "DELETE FROM pedidos WHERE id_pedido=" . $_GET['id_pedido'];

if (mysqli_query($con, $sql)) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error"));
}
