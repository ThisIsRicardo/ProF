<?php

date_default_timezone_set('America/El_Salvador'); //Esto sirve para que la hora que registre sea la de nueestro país.
include("con_db.php"); //Estamos incluyendo la conexión a la base de datos.
include("validacion.php");

if (isset($_POST['registrobtn'])){

        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $email = trim($_POST['email']);
        $contrase = ($_POST['contrase']);        
        $contra = ($_POST['contra']);
        $sexo = ($_POST['sexo']); 
        $tipoUsuario = !empty(($_POST['tipoUsuario']));           
        $fecha_reg = date("d/m/y");
        $hora = date("H:i:s");

        if($tipoUsuario == ""){
            $tipoUsuario = "Usuario";
        }
        if (strlen($contrase) < 6){ //Este código es para darle a entender de que si el campo contraseña es menor a 6 carácteres me arroje el sig msj de error.
            echo '<script>
            alert("Contraseña muy corta.");
            history.go(-1);
            </script>';
        }else
        if ($contrase == $contra){
            $consulta = "INSERT INTO datos(nombre, apellido, email, contrase, sexo, tipoUsuario, fecha_reg, hora) VALUES ('$nombre', '$apellido', '$email', '$contrase', '$sexo','$tipoUsuario', '$fecha_reg', '$hora')";
            $resultado = mysqli_query($conex,$consulta);
            
            echo '<script>alert("Usuario registrado exitosamente.");
            history.go(-1);
            </script>';
            
 
        }else{
            echo '<script>alert("Las contraseñas no coinciden.")
            window.history.go(-1);
            </script>';
            
        }

        
    
}
?>
