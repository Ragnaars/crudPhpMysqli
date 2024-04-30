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

$id_cliente = $_POST['id_cliente'];
$fecha_pedido = $_POST['fecha_pedido'];
$total = $_POST['total'];

// Verificar si el id_cliente existe en la tabla clientes
$check_cliente_query = "SELECT COUNT(*) AS count FROM clientes WHERE id_cliente = '$id_cliente'";
$check_cliente_result = mysqli_query($conn, $check_cliente_query);
$cliente_exists = mysqli_fetch_assoc($check_cliente_result)['count'];

if ($cliente_exists > 0) {
    // Si el cliente existe, insertar el pedido
    $sql = "INSERT INTO pedidos (id_cliente, fecha_pedido, total) VALUES ('$id_cliente', '$fecha_pedido', '$total')";
    if (mysqli_query($conn, $sql)) {
        $pedido = [
            'id_pedido' => mysqli_insert_id($conn),
            'id_cliente' => $id_cliente,
            'fecha_pedido' => $fecha_pedido,
            'total' => $total
        ];
        echo json_encode(array("status" => "success", "code" => 1, "document" => $pedido));
    } else {
        echo json_encode(array("status" => "error", "code" => 0, "message" => "Error al insertar el pedido"));
    }
} else {
    // Si el cliente no existe, devolver un mensaje de error
    echo json_encode(array("status" => "error", "code" => 0, "message" => "El id_cliente no existe"));
}

$conn->close();
