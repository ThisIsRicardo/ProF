<?php
include("php/con_db.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
    $consulta = "DELETE FROM datos WHERE id = $id";
    
    $resultado =mysqli_query($conex, $consulta);
    
	if(!$resultado){
		die("ERROR");	
	}
    echo '<script>
    alert("Usuario eliminado con éxito.");
    window.location= "baseDeDatos.php";
    </script>';
}

?>