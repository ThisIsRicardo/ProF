<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MANIAC | Gracias </title>
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
        <div class="row justify-content-center align-items-center vh-100">
        <div class="col-xs-8 col-sm-10 col-md-7 col-lg-5 col-xl-5">
<h2 class="text-center text-danger "><svg width="50" height="50" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> ¡GRACIAS POR TU COMPRA!</h2>
<p class="text-danger lead text-center">Tu producto se preparará pronto.</p>
<br>
<a href="camisetas.php" class="list-group-item list-group-item-action bg-transparent lead text-center"><i class="fas fa-box fa-4x text-danger fas-align-center"></i></a>
<br>
<form action="facF.php?id=<?php echo $row['id']; ?>" method="GET">

<div class="row">
          <div class="col text-center">
      <button class="btn btn-outline-dark text-danger lead" type="submit" name="enviar" value="getvalues">VER FACTURA</button>
      </div>
      </form>
</div>
</div>
</div>


<footer class="text-center text-danger"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> MANIAC 2020, DERECHOS RESERVADOS.</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>   
</body>
</html>