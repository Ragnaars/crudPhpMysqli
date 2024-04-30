<?php
// Permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permitir los métodos GET, POST, PUT, DELETE, OPTIONS
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Permitir los encabezados "Content-Type" y "Authorization"
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Permitir incluir cookies en las solicitudes
header("Access-Control-Allow-Credentials: true");

require ("../conexion.php");

$conn = conexion();

$id_pedido = $_POST['id_pedido'];
$id_cliente = $_POST['id_cliente'];
$fecha_pedido = $_POST['fecha_pedido'];
$total = $_POST['total'];

//query

$sql = "UPDATE PEDIDOS SET id_cliente = '$id_cliente', fecha_pedido = '$fecha_pedido', total = '$total' WHERE id_pedido = '$id_pedido'";



if (mysqli_query($conn, $sql)) {
    $pedido = [
        'id_pedido' => mysqli_insert_id($conn),
        'id_cliente' => $id_cliente,
        'fecha_pedido' => $fecha_pedido,
        'total' => $total
    ];
    echo json_encode(array("status" => "sucess", "code" => 1, "document" => $pedido));
} else {
    echo json_encode(array("status" => "error", "code" => 0, "document" => $pedido));
}



