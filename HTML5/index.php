

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MANIAC | Home </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<link rel="shortcut icon" href="img/Bad-Bunny-Logo.png" type="image/png">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
<!-- CSS normal -->
<link rel="stylesheet" href="css/estilo.css">
<!-- Icons script -->
<script src="https://kit.fontawesome.com/0f03f239b6.js" crossorigin="anonymous"></script>
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-muted">
  <a class="navbar-brand text-danger" href="index.php"><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>  MANIAC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <a class="nav-link lead" href="index.php"><mark class="text-light bg-dark"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg> Inicio</mark></a>
      </li>
      <?php
      $_SESSION['email'] = ""; 
      include ("php/con_db.php");
      if(!isset($_SESSION['email'])){

      echo "<a class=\"nav-link lead\" href=\"camisetas.php\"><mark class=\"text-light bg-dark\"><i class=\"fas fa-tshirt\"></i> Camisetas</mark></a>
      </li>";
      }
      ?>
      <li class="nav-item">
        <a class="nav-link lead"  data-toggle="modal" data-target="#exampleModalCenter1"><mark class="text-light bg-dark"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-inbox-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
</svg> Contáctanos</mark></a>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel">FORMULARIO DE CONTACTO</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="php/contacto.php" method="POST">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
            </div>
          </div><br>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-secondary">Correo electrónico:</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="imurpuppet@gmail.com">
          </div>
          <div class="col">
          <label class="text-secondary mb-2">Asunto:</label>
              <input type="text" class="form-control" placeholder="Ej. consulta" name="asunto" required>
            </div><br>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label text-secondary">Comentario:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario" placeholder="Nosotros te contactaremos en las próximas 24 horas."></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" name="registrarcom">Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a class="btn btn-dark" href="login.php" role="button">Iniciar sesión</a>
    </form>
  </div>
</nav>
</header>

<div class="container">
<div class="row justify-content-center align-items-center vh-100">
<div class="col">
<div class="jumbotron-muted text-dark">
  <h1 class="display-4"><mark class="text-danger bg-white"><svg width="50" height="50" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> MANIAC</mark></h1><br>


  <p class="lead"><mark class="text-light bg-danger">Especializados en tela de alta calidad y con diseños exclusivos </mark> </p>
  <hr class="my-4">
  <p class="lead"><mark class="text-light bg-dark">¿Quieres un descuento del 50% en tu primera  compra?</mark></p>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
  Registrate
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLongTitle"><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
        </svg> REGISTRARTE</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="php/registro.php" method="POST">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nombre"  name="nombre" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-secondary">Correo eléctronico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" placeholder="imurpuppet@gmail.com" required>
          </div><br>
          <div class="row">
          <div class="col">
            <input type="password" class="form-control" placeholder="Ingrese una contraseña" name="contrase" required>
          </div>
          <div class="col">
            <input type="password" class="form-control" placeholder="Confirme la contraseña" name="contra" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col">
            <label>Sexo:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="inlineRadio1" name="sexo" value="Masculino" required="required">
              <label class="form-check-label text-secondary" for="inlineRadio1" >Masculino</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="inlineRadio1" name="sexo" value="Femenino" required="required">
              <label class="form-check-label text-secondary" for="inlineRadio1">Femenino</label>
            </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-success" type="submit" name="registrobtn" value="getvalues">Registrarse</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>


<footer class="text-white text-center">MANIAC 2020, DERECHOS RESERVADOS.</footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
</body>
</html>