<?php
include ("php/con_db.php");

if(isset($_POST['enviar'])){
$nombre    =  $_POST['nombre'];  
$apellido  =  $_POST['apellido'];  
$direccion =  $_POST['direccion']; 
$numero    = $_POST['numero'];
$email     = $_POST['email'];
$ciudad    = $_POST['ciudad'];

if(isset($_POST['enviar'])){
$consulta = "INSERT INTO facturacion(id, nombre, apeliidos, direccion, numero, email, ciudad) VALUES ('', '$nombre', '$apellido', '$direccion', '$numero', '$email', '$ciudad')";

$resultado = mysqli_query($conex, $consulta);

echo '<script>
alert("Datos ingresados correctamente.");
window.location = "index.php";
</script>';

}
}
?>