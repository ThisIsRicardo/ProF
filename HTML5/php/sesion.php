<?php
include ("con_db.php"); 

$email = $_POST['email'];
$contrase = $_POST['contrase'];
$tipoUsuario = $_POST['tipoUsuario'];
session_start();
$_SESSION['email'] = $email;


$consulta = "SELECT * FROM datos WHERE email ='$email' AND contrase ='$contrase' AND tipoUsuario = '$tipoUsuario'";

$resultado = mysqli_query($conex,$consulta);

$filas = mysqli_num_rows($resultado);




if ($filas && $tipoUsuario == "Administrador"){
header("location: ../admin.php");

}
   if($filas && $tipoUsuario == "Usuario"){
      header("location: ../camisetas.php");
   
}else{
   echo '<script>
   alert("Correo, contraseña o rol incorrectos, vuelva intentarlo.");
   history.go(-1);
   </script>';

}

mysqli_free_result($resultado);
mysqli_close($conex);
    ?>
