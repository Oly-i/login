<?php
include('config.php');
session_start();

if(isset($_POST['index'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($username) || empty($email) || empty($password)) {
        die('Todos los campos son obligatorios');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Formato de email inválido');
    }

    try {
        $check = $connection->prepare("SELECT email FROM usuarios WHERE email = ?");
        $check->execute([$email]);
        
        if($check->rowCount() > 0) {
            die('Este email ya está registrado');
        }

        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        
        $insert = $connection->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
        $result = $insert->execute([$username, $email, $password_hash]);
        
        if($result) {
            echo 'Registro exitoso!';
            $_SESSION['user'] = $username;
        } else {
            echo 'Error al registrar. Intenta nuevamente.';
        }
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
