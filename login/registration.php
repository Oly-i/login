<?php
include('config.php');
session_start();

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM usuarios WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() >0 ){ //si existe un indice con ese correo 
        echo '<p class="error"> Este ya existe </p>';
    

    if($query->rowCount() == 0) { //no existe un indice con ese correo, y lo va a guardar
        $query=$connection->prepare
        echo '<p class="success"> Registro guardado:) </p>';
    }else{
        echo '<p class="error"> Error al guardar </p>';
    }

    }

}

?> 