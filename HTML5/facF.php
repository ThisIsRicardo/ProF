<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/facF.css">
    <title>Factura Final</title>
</head>
<body>
<div class="container">
<div class="row justify-content-center align-items-center">
<div class="col-xs-12 col-sm-10 col-md-7 col-lg-5 col-xl-5">
<br>
<h1 class="text-center lead text-danger"><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> FACTURA MANIAC, LTD.</h1>
<?php
include ("php/con_db.php");


$consulta = "SELECT facturacion.id, facturacion.nombre, facturacion.apeliidos, facturacion.direccion, facturacion.numero, facturacion.email, facturacion.ciudad, facturacion.fecha_compra, fact.cantidad, fact.descrip, fact.precio, fact.total FROM facturacion INNER JOIN fact ON facturacion.id = fact.id  ORDER BY fact.id DESC";

$resultado = mysqli_query($conex, $consulta);

while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    echo "<p class=\"lead text-center\" ><small>LTD, MANIAC SV" ."</small></p>";
    echo "<p class=\" text-center\" ><small>CENTRO COMERCIAL PLAZA MUNDO, ANCLA A,". "<br>" .
    "KM 4 1/2 BOULEVARD DEL EJERCITO,". "<br>". "SOYAPANGO, SAN SALVADOR"."</small></p>";
    echo "<p class=\"lead text-center\" ><small>----------------------------------------------" ."</small></p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Comprado por: ".$_SESSION['email']."</small> </p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Rec: ". mt_rand(2323234343421,4568454545456)."</small> </p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Cajero: "."Tienda virtual"."</small> </p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Fecha: ".$row['fecha_compra']."</small> </p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Nro. Ticket: ". mt_rand(95434,100000)."</small> </p>";
    echo "<p class=\"lead text-center\" ><small>------------------------------------------------" ."</small></p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Cantidad |"." Descripción prod. |"." Precio |"." Total $:"."</small> </p>";
    echo "<p class=\"lead text-center\" ><small>------------------------------------------------" ."</small></p>";
    echo "<p class=\" lead text-left ml-5\" >"."--".$row['cantidad']."---".$row['descrip']."--"."$".$row['precio']."---"."$".$row['total']."</small> </p>";
    echo "<p class=\"lead text-center\" ><small>------------------------------------------------" ."</small></p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Subtotal $:".str_repeat("&nbsp;", 41).$row['total']."USD"."</small></p>";
    echo "<p class=\"lead text-left ml-5\" ><small>Total a pagar $:".str_repeat("&nbsp;", 34).$row['total']."USD"."</small></p>";
    echo "<p class=\"lead text-center\" ><small>------------------------------------------------" ."</small></p>";
    echo "<p class=\"lead text-center\" ><small>GRACIAS POR TU COMPRA" ."</small></p>";
    echo "<p class=\"lead text-center\" ><small>www.maniac.com.sv"."</small></p>";
    echo "<p class=\"lead text-center\" ><small>------------------------------------------------" ."</small></p>";  
    exit;
    $conex->close();
}
?>

</div>
<div>
</div>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>