<?php
include ("php/con_db.php");
session_start();
error_reporting(0);
$_SESSION['email'];
$_SESSION['tipoUsuario']; 

$consulta = "SELECT * FROM datos WHERE  email = '".$_SESSION['email']."'";

  $resultado = mysqli_query($conex, $consulta);

  while ($row = mysqli_fetch_assoc($resultado)){
  $_SESSION['tipoUsuario'] = $row['tipoUsuario'];
   $_SESSION['email'] = $row['nombre'];


  }

  if($_SESSION['email'] == null || $_SESSION['email'] == ''){
    echo '<script>
    alert("Acceso Restringido.");
    window.location= "login.php";
    </script>';
    die();
  }else if ($_SESSION['tipoUsuario'] != "Administrador" || $_SESSION['tipoUsuario'] == '' ){
    echo '<script>
    alert("No tienes los permisos necesarios para ingresar.");
    window.location= "login.php";
    </script>';
    die();
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>

<title>Inventario | Admin</title>
<!-- CSS BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
<!-- CSS NORMAL -->
<link rel="stylesheet" href="css/inventario.css">
<!-- VIEWPORT -->
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<!-- ICON SCRIPT -->
<script src="https://kit.fontawesome.com/0f03f239b6.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white border-right vh-100" id="sidebar-wrapper">
        <div class="sidebar-heading  text-danger  text-center lead"><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> MANIAC</div>
<div class="list-group list-group-flush overflow-auto h-100 ">
            <p class="list-group-item list-group-item-action bg-white  lead"><i class="fas fa-user-astronaut fa-1x"></i>  Bienvenido, <?php echo $_SESSION['email'] ?></p>
            <a href="admin.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-laptop"></i> Panel de control</a>
            <a href="agregarUsuarios.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-user-plus"></i> Agregar usuarios</a>
            <a href="agregarProductos.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-cart-plus"></i> Agregar productos</a>
            <a href="inventario.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-clipboard"></i> Inventario</a>
            <a href="baseDeDatos.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-database"></i> Base de datos</a>
            <a href="facturacion.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-file-invoice-dollar"></i> Facturación</a>
            <a href="cerrarSesion.php" class="list-group-item list-group-item-action bg-white lead"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-white bg-dark border-bottom">
            <button class="btn btn-danger btn-lg" id="menu-toggle"><i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">               
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </nav>
            <h1 class="mt-4 text-center text-danger">Panel de control </h1><br>

            <!-- OPCIÓN 1 -->
            <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
             <div class="card h-100">           
            <div class="card-body text-center">
            <a class="card-text text-center" href="agregarUsuarios.php"><svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
           <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg></a>
            <p class="lead text-center">Agregar usuario</p>
      </div>
    </div>
  </div>
<!-- End Opción 1 -->

 <!-- Opción  -->
 <div class="col">
    <div class="card h-100">
      <div class="card-body text-center">
        <a class="card-text" href="agregarProductos.php"><i class="fas fa-cart-plus fa-3x"></i></a>
        <p class="lead">Agregar productos</p>
      </div>
    </div>
  </div>
  <!-- End Opción  -->

<!-- Opción 2 -->
  <div class="col">
    <div class="card h-100">
      <div class="card-body text-center">
        <a class="card-text" href="inventario.php"><svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-clipboard-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg></a>
<p class="lead text-center">Inventario</p>
      </div>
    </div>
  </div>
  <!-- end Opción 2 -->

  

  <!-- Opción 3 -->
  <div class="col">
    <div class="card h-100">
      <div class="card-body text-center">
        <a class="card-text" href="baseDeDatos.php"><i class="fas fa-database fa-4x"></i></a>
        <p class="lead">Base de datos</p>
      </div>
    </div>
  </div>
  <!-- End Opción 3 -->

  <!-- Opción  -->
  <div class="col">
    <div class="card h-100">
      <div class="card-body text-center">
        <a class="card-text" href="facturacion.php"><i class="fas fa-file-invoice-dollar fa-4x"></i></a>
        <p class="lead">Facturación</p>
      </div>
    </div>
  </div>
  <!-- End Opción  -->

  <!-- Opción 4 -->
  <div class="col">
    <div class="card h-100">
      <div class="card-body text-center">

        <a class="card-text" href="cerrarSesion.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
        <p class="lead">Cerrar sesión</p>
      </div>
    </div>
  </div>
</div>
    <!-- End Opción 4 -->        

    <!-- /#page-content-wrapper -->
</div>



<!-- BOOSTRAP CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>

<script type="text/javascript">
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
          });
    </script>
</body>
</html>