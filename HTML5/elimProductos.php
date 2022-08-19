<?php
include("php/con_db.php");

if(isset($_GET['codigo'])){
	$codigo = $_GET['codigo'];
    $consulta = "DELETE FROM productos WHERE codigo = $codigo";
    
    $resultado =mysqli_query($conex, $consulta);
    
	if(!$resultado){
		die("ERROR");	
	}
    echo '<script>
    alert("Producto eliminado con éxito.");
    window.location= "inventario.php";
    </script>';
}

?>