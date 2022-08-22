<?php


$conex = mysqli_connect("localhost","root","","registro");
if (isset($conex)) {
    //echo "Conexion Exitosa";
  }else{
    echo "Error";
  }

?>