<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "validacion";

    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error){
        die("conexion fallida: ". $conn->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nombre    = mysqli_real_escape_string($conn, $_POST['nombre']);
        $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);

        $encryption_key = "clave_secreta";

        $sql = "INSERT INTO usuarios(nombre, apellidos) VALUES(AES_ENCRYPT('$nombre', '$encryption_key'), AES_ENCRYPT('$apellidos', '$encryption_key'))";
        

        if($conn ->query($sql) === TRUE){
            echo "Los datos se guardaron correctamente.";
        }else{
            echo "conexion fallida: ". $conn->connect_error;
        }
    }
    $conn->close();
?>
<form action="validacion.php" method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Apellidos: <input type="text" name="apellidos" required><br>

    <input type="submit" value="Aceptar"><br>
</form>