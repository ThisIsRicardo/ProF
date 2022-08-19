<?php
session_start();
error_reporting(0);
include ("php/con_db.php");

$_SESSION['email']; 
$consulta = "SELECT * FROM datos WHERE  email = '".$_SESSION['email']."'";

  $resultado = mysqli_query($conex, $consulta);

  while ($row = mysqli_fetch_assoc($resultado)){
    
   $_SESSION['email'] = $row['nombre'];
  }
  if($_SESSION['email'] == null || $_SESSION['email'] == ''){
    echo '<script>
    alert("Tienes que iniciar sesión.");
    window.location= "login.php";
    </script>';
    die();
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MANIAC | Camisetas </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
<!-- CSS normal -->
<link rel="stylesheet" href="css/camisetas.css">
<!-- Icons script -->
<script src="https://kit.fontawesome.com/0f03f239b6.js" crossorigin="anonymous"></script>
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-muted">
  <a class="navbar-brand text-danger" ><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>  MANIAC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php 
        if(isset($_SESSION['email'])){
          echo "<div class=\"visually-hidden\"><a class=\"nav-link lead\" href=\"index.php\"><mark class=\"text-light bg-dark\">Inicio</mark></a>
      </li></div>";
        }
        ?>

      <a class="nav-link lead" href="camisetas.php"><mark class="text-light bg-dark"><i class="fas fa-tshirt"></i> Camisetas</mark></a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link lead" data-toggle="modal" data-target="#exampleModalCenter1"><mark class="text-light bg-dark"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-inbox-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
              <input type="text" class="form-control" placeholder="Nombre"  name="nombre" required>
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
            <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3" placeholder="Nosotros te contactaremos en las próximas 24 horas."></textarea>
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
    <?php 
    if(isset($_SESSION['email'])){
    echo "<div class=\"visually-hidden\"><form class=\"form-inline my-2 my-lg-0\">
    <a class=\"btn btn-dark\" href=\"login.php\" role=\"button\">Iniciar sesión</a>
    </form> </div>";
    echo "<a href=\"cerrarSesion.php\" class=\"lead text-light mr-3\"><p>"."Cerrar Sesión</a></p>";
    }
    ?>
  </div>
</nav>
</header>
<br>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark">
    <li class="breadcrumb-item lead text-light">Bienvenido, <?php echo $_SESSION['email']."."?></li>
    
  </ol>
</nav>
</div>
<br>
<h1 class="text-center"><mark class="text-danger bg-dark">Camisetas</mark></h1>
<br>
<div class="container">
  <div class="row">
    <div class="col">
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-4 g-5">
  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter2">
      <img src="img/img1.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Pretty As Fuck</h5>
      </div>
    </div>
  </div>
  <!--Modal 2 -->
  <div class="modal fade" id="exampleModalCenter2"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel">T-shirt Pretty As Fuck</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 61";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter2">
      <img src="img/img1.jpg" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 61";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- End Modal 2 -->
  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter3">
      <img src="img/boys.jpg" class="card-img-top" alt="..." >
      <div class="card-body">
        <h5 class="card-title text-center text-danger">The Boys Are Sad</h5>
      </div>
    </div>
  </div>
  <!-- MODAL 3 -->
  <div class="modal fade" id="exampleModalCenter3"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 66";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 66";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter3">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 66";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 66";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 3 -->


  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter4">
      <img src="img/smile.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger"> Tumblr Face</h5>
      </div>
    </div>
  </div>

 <!-- MODAL 4 -->
 <div class="modal fade" id="exampleModalCenter4"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 65";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 65";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter4">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 65";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 65";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 4 -->


  
  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter5">
      <img src="img/hoodie.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Hoodie - Teardrop</h5>
      </div>
    </div>
  </div>

 <!-- MODAL 5 -->
 <div class="modal fade" id="exampleModalCenter5"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 63";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 63";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter5">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 63";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 63";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 5 -->







  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter6">
      <img src="img/peopleare.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">People are Poison</h5>
      </div>
    </div>
  </div>




  <!-- MODAL 6 -->
 <div class="modal fade" id="exampleModalCenter6"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 67";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 67";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter6">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 67";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 67";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 6 -->


  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter7">
      <img src="img/unis.jpg" class="card-img-top" alt="..."  >
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Unisex Cat</h5>
      </div>
    </div>
  </div>


<!-- MODAL 7 -->
<div class="modal fade" id="exampleModalCenter7"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 68";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 68";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter7">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 68";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 68";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 7 -->




  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter8">
      <img src="img/mr.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">T-shirt  Mr Robot</h5>
      </div>
    </div>
  </div>

<!-- MODAL 8 -->
<div class="modal fade" id="exampleModalCenter8"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 69";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 69";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter8">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 69";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 69";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 8 -->


  <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter9">
      <img src="img/not.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger"> Not Today Satan</h5>
      </div>
    </div>
  </div>

  <!-- MODAL 9 -->
<div class="modal fade" id="exampleModalCenter9"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title lead text-danger" id="exampleModalLabel"><?php
        include("php/con_db.php"); 
    

        $consulta = "SELECT * FROM productos WHERE codigo = 64";
        $resultado = mysqli_query($conex, $consulta);
  
        while($row = mysqli_fetch_array($resultado)){
        echo $row['nombre'];
          }
        ?></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="compraFac.php?codigo=<?php 
      include("php/con_db.php"); 
    

      $consulta = "SELECT * FROM productos WHERE codigo = 64";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
      echo $row['codigo'];
        }
       ?>" method="POST" >
      <div class="col">
    <div class="card bg-dark text-light h-100" data-toggle="modal" data-target="#exampleModalCenter9">
      <img src="<?php include("php/con_db.php"); 

      $consulta = "SELECT * FROM productos WHERE codigo = 64";
      $resultado = mysqli_query($conex, $consulta);

      while($row = mysqli_fetch_array($resultado)){
        echo $row['ruta'];
      }
  ?>" class="card-img-top" id="pretty" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center text-danger">Descripción</h5>
        <p class="card-text text-center lead">
        <?php include("php/con_db.php"); 

        $consulta = "SELECT * FROM productos WHERE codigo = 64";
        $resultado = mysqli_query($conex, $consulta);

        while($row = mysqli_fetch_array($resultado)){
          echo $row ['descripcion'];
          echo "<br>"."<p class=\"text-center lead\">Precio: ". "$" .$row['precioEntrada'];
          echo "<br>"."<p class=\"text-center lead\">" .$row['cantidad']. " disponible(s)";
          echo "<div class=\"row row-cols-3 justify-content-center align-items-center\"> "."<p class=\"text-center  mt-3\">Cantidad: </p>"."<input type=\"number\" class=\"form-control-sm\" placeholder=\"Ej. 1\" name=\"num\" required> </div>";
        }
        ?></p>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Comprar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- END MODAL 8 -->

</div>
  </div>
</div>
</div>
<br><br>
<footer class="text-center text-light">MANIAC 2020, DERECHOS RESERVADOS.</footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>   
</body>
</html>