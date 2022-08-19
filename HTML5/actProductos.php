<?php
session_start();
include ("php/con_db.php");

if (isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];

    $consulta = "SELECT * FROM productos WHERE codigo = $codigo";

    $resultado = mysqli_query($conex, $consulta);

    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $codigo = $row['codigo'];
    $destino = $row['ruta'];
    $nombre = $row['nombre'];
    $precioEntrada = $row['precioEntrada'];
    $categoria = $row['categoria'];
    $cantidad = $row['cantidad'];
    $descripcion = $row['descripcion'];
}
}

    if(isset($_POST['actualizar'])){
        $codigo = $_GET['codigo'];
        $nombreImg = $_FILES['img']['name'];
        $ruta = $_FILES['img']['tmp_name'];
        $destino = "productos/".$nombreImg;
        $nombre = $_POST['nombre'];
        $precioEntrada = $_POST['precioEntrada'];
        $categoria = $_POST['categoria'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];

        if(copy($ruta,$destino)){
        $consulta = "UPDATE productos SET ruta ='$destino', nombre = '$nombre', precioEntrada = '$precioEntrada', categoria = '$categoria', cantidad = '$cantidad', descripcion = '$descripcion' WHERE codigo = $codigo ";
        
        mysqli_query($conex, $consulta);

        echo '<script>
        alert("Producto actualizado correctamente.");
        window.location= "inventario.php";
        </script>';
}
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>

<title>Inventario | Actualizar productos</title>
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
        <h1 class="mt-4 ml-2 text-center lead">Actualizar Productos</h1>

    <!--  Inicio Formulario Agregar productos -->
        <div class=" mt-4 container">
        <div class="row row justify-content-center align-items-center">
        <div class="col col-xl-6 col-sm-12 col-xs-12 col-md-6 ">
        <div class="card mt-4 pl-4 pr-4">
        <form action="actProductos.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col"><br>
    <div class="mb-3">
  <label for="formFile" class="form-label">Imagen del producto:</label>
  <input class="form-control" type="file" id="formFile" name="img" required>
</div>
<label class=" mb-2">Nombre del producto:</label>
        <input type="text" class="form-control" placeholder="Ej. Camisa Roja" aria-label="Nombre Producto" name="nombre"  value="<?php echo $nombre; ?>" required>
        </div>
    </div>
    <br>
          <div class="row">
          <div class="col">
          <label class="mb-2">Precio entrada ($):</label>
            <input type="number" class="form-control"  name="precioEntrada" value="<?php echo $precioEntrada; ?>" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col">
          <label class="mb-2">Categoria:</label>
            <input type="text" class="form-control" placeholder="Ej. Camisetas" name="categoria"  value="<?php echo $categoria; ?>" required>
          </div>
          <div class="col">
          <label class="mb-2">Cantidad:</label>
            <input type="number" class="form-control"  name="cantidad" value="<?php echo $cantidad; ?>" required>
          </div>
        </div><br>
        <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripción del producto:</label>
  <textarea class="form-control" name="descripcion" rows="3"  ><?php echo $descripcion; ?></textarea>
</div>
    <br>
      <div class="row">
          <div class="col text-center">
      <button class="btn btn-success mb-4" type="submit" name="actualizar" value="getvalues">Actualizar Producto</button>
      </div>
      </div>
    </div>
        </form>
        </div>
        </div>
        </div>
    <!-- End Formulario Add product -->

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