<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compra Divisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'menu.php'; ?>

<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {	
$id_cliente = mysqli_real_escape_string($mysqli, $_POST['id_cliente']);
$abrev = mysqli_real_escape_string($mysqli, $_POST['abrev']);
$cantidad = mysqli_real_escape_string($mysqli, $_POST['cantidad']);

// checking empty fields
if(empty($cantidad) || empty($abrev) || empty($id_cliente)  ) {
            
    if(empty($abrev)) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Campo abreviatura vacío";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    
    if(empty($id_cliente)) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Campo cliente vacío";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    if(empty($cantidad)) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Campo cantidad vacío";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }
    
} else { 
    // if all the fields are filled (not empty) 	
    //insert data to database
        $result = mysqli_query($mysqli, "SELECT valor, valor * $cantidad FROM tb_divisas WHERE abrev='$abrev'");
        $res = mysqli_fetch_array($result);
    
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-success' role='alert'>";
        echo "Compra registrada <br/>";
        echo "Cliente ID:".$id_cliente."<br/>";
        echo $abrev." ".$res[0]." * ".$cantidad." = $".$res[1]." MNX";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        $result = mysqli_query($mysqli, "INSERT INTO tb_venta_divisas 
                                    (id_cliente,abrev,valor,cantidad,total,fecha_act,tipo_operacion)
                                    VALUES ('$id_cliente','$abrev',$res[0],$cantidad,$res[0]*$cantidad,now(),2)");

        $result = mysqli_query($mysqli, "UPDATE tb_divisas SET reserva = reserva + $cantidad  WHERE abrev='$abrev'");
    
    //display success message
    
    
}
echo "<br/><a class='btn btn-primary' href='index.php'>Inicio</a>";
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

   
  

