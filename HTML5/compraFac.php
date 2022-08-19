<?php
session_start();
include ("php/con_db.php");



if(isset($_POST['enviar'])){
$nombre    =  $_POST['nombre'];  
$apellido  =  $_POST['apellido'];  
$direccion =  $_POST['direccion']; 
$numero    = $_POST['numero'];
$email     = $_POST['email'];
$ciudad    = $_POST['ciudad'];


$consulta = "INSERT INTO facturacion(nombre, apeliidos, direccion, numero, email, ciudad) VALUES ( '$nombre', '$apellido', '$direccion', '$numero', '$email', '$ciudad')";

$resultado = mysqli_query($conex, $consulta);



echo '<script>
alert("Compra ingresada exitosamente.");
window.location = "gracias.php";
</script>';


}
?>
<?php
        include ("php/con_db.php");

        $num = $_REQUEST['num'];
        $codigo = $_GET['codigo'];
        $consulta = "SELECT * FROM productos WHERE codigo = '$codigo'";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
            $cant = $row['cantidad'];
            if($num > $cant){
                echo '<script>
                alert("Error, el número que ingresaste es mayor a las existencias del producto.");
                window.history.go(-1);
                </script>';
                die();
                $conex->close();
            
            }if($cant <= 0){
                echo '<script>
                alert("Error, producto agotado.");
                window.history.go(-1);
                </script>';
                exit;
            }else if($num < 0){
              echo '<script>
                alert("Error, no se permiten números negativos.");
                window.history.go(-1);
                </script>';
                exit;
            }else if($num == 0){
              echo '<script>
                alert("Error, ingresa una cantidad válida.");
                window.history.go(-1);
                </script>';
                exit;
            }
          }
                ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MANIAC | Facturación </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
<!-- CSS normal -->
<link rel="stylesheet" href="css/facturacion.css">
<!-- Icons script -->
<script src="https://kit.fontawesome.com/0f03f239b6.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
<h1 class="text-center text-danger lead"><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> Completar Transacción</h1>
<br><br>
<div class="accordion text-danger" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header  id="headingOne ">
      <button class="accordion-button text-danger" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Revisar Articulo
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="accordion-body">
        <?php
        include ("php/con_db.php");

        $num = $_REQUEST['num'];
        $codigo = $_GET['codigo'];
        $consulta = "SELECT * FROM productos WHERE codigo = '$codigo'";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          $precio = $row['precioEntrada'];
          $precioFinal = $row['precioEntrada'] * $num;
          $descrip = $row['nombre'];

          $consul = "INSERT INTO fact(cantidad, descrip, precio, total) VALUES ('$num', '$descrip','$precio', '$precioFinal')";

          $resulta = mysqli_query($conex, $consul);
            
            
            echo  "<p class=\"lead\">".$descrip. "<br> </p>";
            echo '<img src="'.$row['ruta'].'" width="200px" height="200px">';
            echo '<br>';
           
            echo "<br>". "<p class=\"lead\">Precio c/u: "."$". $precio."</p>";
            echo  "<p class=\"lead \">Unidades adquiridas: " .$num . "</p>";
         
            echo  "<p class=\"lead\">Total a pagar: " ."$". $precioFinal. "</p>";


            $cons = "UPDATE productos SET cantidad = cantidad - $num WHERE codigo = '$codigo'";
   
            mysqli_query($conex, $cons);
        }
        ?>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header text-danger" id="headingTwo">
      <button class="accordion-button collapsed text-danger" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Dirección de entrega
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="accordion-body">
      <!--FORMULARIO -->
      <form action="compraFac.php" method="POST">
          <div class="row">
            <div class="col">
            <label class=" lead mb-2">Nombres:</label>
              <input type="text" class="form-control" placeholder="Nombres"  name="nombre" required>
            </div>
            <div class="col">
            <label class="lead mb-2">Apellidos:</label>
              <input type="text" class="form-control" placeholder="Apellidos" name="apellido" required>
            </div>
          </div><br>
          <label class=" lead mb-2">Dirección de entrega:</label>
          <input type="text" name="direccion" class="form-control" placeholder="Ej. Bosques de la paz, calle 3 oriente" required>
          <br>
          <div class="row row-cols-3">
          <div class="col">
          <label class="lead mb-2">Número de teléfono:</label>
          <input type="tel" class="form-control" placeholder="Ej. 7155-8932"  name="numero" required>
          </div>
          </div><br>
          <label class="lead mb-2">Correo electrónico:</label>
          <input type="email" class="form-control" placeholder="Ej. imurpuppet@gmail.com" required name="email">
          <br>
          <div class="row row-cols-3">
          <div class="col">
          <label class="lead mb-2">Ciudad:</label>
          <input class="form-control" type="text" name="ciudad" placeholder="Ej. San Salvador" required>
            </div>
            </div><br>
            <div class="row">
          <div class="col text-center">
      <button class="btn btn-outline-dark text-danger btn-lg mb-4" type="submit" name="enviar" value="getvalues">Comprar</button>
            </form>
      </div>
    </div>
  </div>
  </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>   
</body>
<footer class="text-center text-danger lead">MANIAC 2020, DERECHOS RESERVADOS.</footer>
</html>