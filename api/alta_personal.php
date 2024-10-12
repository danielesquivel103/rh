<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $puesto = $_POST['puesto'];
    $fecha_contratacion = date('Y-m-d');

    $sql = "INSERT INTO empleados (nombre, apellido, email, puesto, fecha_contratacion) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombre, $apellido, $email, $puesto, $fecha_contratacion]);
        echo json_encode(['success' => true, 'message' => 'Personal dado de alta exitosamente']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error al dar de alta al personal: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}