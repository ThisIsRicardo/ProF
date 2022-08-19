<?php
include ("con_db.php");

date_default_timezone_set('America/El_Salvador');

if (isset($_POST['registrarcom'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];
    $fecha_com = date("d/m/y");

    $consulta = "INSERT INTO contacto(nombre, apellido, email, asunto, comentario, fecha_com) VALUES ('$nombre','$apellido','$email', '$asunto', '$comentario','$fecha_com')";
    $resultado = mysqli_query($conex,$consulta);
    echo '<script>
    alert("Tu mensaje fue enviado exitosamente");
    history.go(-1);
    </script>';
}
?>