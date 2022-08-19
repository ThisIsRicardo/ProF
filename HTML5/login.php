<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MANIAC | Iniciar sesión </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous"><!-- CSS normal -->
<link rel="stylesheet" href="css/login.css">
<!-- Icons script -->
<script src="https://kit.fontawesome.com/0f03f239b6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
        <div class="col-xs-8 col-sm-10 col-md-7 col-lg-5 col-xl-5">
        <form action="php/sesion.php" method="POST" class="bg-muted">
          <div class="form-group"><br><br>
          <h3 class="text-center text-danger"><svg width="40" height="40" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
          </svg> MANIAC</h3><br><br>
          <div class="row justify-content-center align-items-center">
          <div class="col-8">
            <label for="exampleInputEmail1" class="text-light">Correo electrónico</label>
            <input type="email" class="form-control"  name="email" required>
          </div>
          </div>
          </div><br>
          <div class="row justify-content-center align-items-center">
          <div class="col-8">
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-light">Contraseña</label>
            <input type="password" class="form-control" name="contrase" id="exampleInputPassword1">
            <small id="emailHelp" class="form-text text-light">Nunca compartas tu contraseña.</small>
            <div class="row">
          <div class="col"><br>
            <label class="text-light">Tipo de rol:</label>
            <div class="form-check ml-2">
              <input class="form-check-input" type="radio" id="inlineRadio1" name="tipoUsuario" value="Usuario" required="required">
              <label class="form-check-label text-light" for="inlineRadio1" >Usuario</label>
            </div>
            <div class="form-check ml-2">
              <input class="form-check-input" type="radio" id="inlineRadio1" name="tipoUsuario" value="Administrador" required="required">
              <label class="form-check-label text-light " for="inlineRadio1">Administrador</label>
            </div>
        </div>
      </div>
          </div>
          </div>
          </div>
        <br>
        <div class="row justify-content-center align-items-center">
          <div class="col-8 text-center lead">
          <button type="submit" class="btn btn-primary text-center">Iniciar sesión</button><br><br>

          <button type="button" class="btn btn-warning text-center" data-toggle="modal" data-target="#exampleModalCenter">
            Registrate
          </button>
          </div>
        </form>
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

          
          <br><br><br>
        
        </div>
        </div>
        
        </div>
        </div>

        

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
</body>
</html>
