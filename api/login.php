<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // En un sistema real, deberías verificar las credenciales contra la base de datos
    // y usar técnicas de hashing para las contraseñas. Este es solo un ejemplo simple.
    if ($username === 'admin' && $password === 'password') {
        session_start();
        $_SESSION['user_id'] = 1;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Credenciales inválidas']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}