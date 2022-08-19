<?php
session_start();
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
            <h1 class="mt-4 text-center lead">Productos en inventario</h1><br>



            <!-- OPCIÓN 1 -->
            <div class="container table-responsive">
            <div class="row">
            <div class="col">
            <table class="table table-default table-bordered border-dark">
  <thead>
    <tr>
      <th scope="col" class="text-center">Código</th>
      <th scope="col" class="text-center">Imagen</th>
      <th scope="col" class="text-center">Nombre del producto</th>
      <th scope="col" class="text-center">Costo ($)</th>
      <th scope="col" class="text-center">Categoria</th>
      <th scope="col" class="text-center">Unidades</th>
      <th scope="col" class="text-center">Descripción</th>
      <th scope="col" class="text-center ">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php
          include ("php/con_db.php");

          $consulta = "SELECT * FROM productos" or die(mysqli_error($conex));
          

          $resultado = mysqli_query($conex,$consulta);

          while ($row = mysqli_fetch_array($resultado))
            { ?>
            <tr>
              <td class="text-center"><?php echo $row['codigo']; ?></td>
              <td class="text-center"><?php echo '<img src="'.$row['ruta'].'" width="200px" height="200px">';?></td>
              <td class="text-center"><?php echo $row['nombre']; ?></td>
              <td class="text-center"><?php echo "$".$row['precioEntrada']; ?></td>
              <td class="text-center"><?php echo $row['categoria']; ?></td>
              <td class="text-center"><?php echo $row['cantidad']; ?></td>
              <td class="text-center"><?php echo $row['descripcion']; ?></td>
              <td>
                <a href="actProductos.php?codigo=<?php echo $row['codigo']; ?>" class="btn btn-dark mb-1">
                <i class="fas fa-edit"></i>
                </a>

                <a href="elimProductos.php?codigo=<?php echo $row['codigo']; ?>" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>

          <?php  }
            ?>
  </tbody>
</table>

        


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