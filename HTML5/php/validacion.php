<?php

$email = $_POST['email'];

$verificar_email = mysqli_query ($conex, "SELECT * FROM datos WHERE email = '$email'");


if (mysqli_num_rows($verificar_email)>0){
    echo '<script>
    alert("El correo ingresado ya esta registrado");
    history.go(-1);
    </script>';
    exit;
}
?>