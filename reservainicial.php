<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserva Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
  <?php include 'menu.php'; ?>

<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {	
$abrev = mysqli_real_escape_string($mysqli, $_POST['abrev']);
$reservai = mysqli_real_escape_string($mysqli, $_POST['reservai']);
// checking empty fields
if(empty($abrev) || empty($reservai) ) {
            
    if(empty($abrev)) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Campo abreviatura vacío";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    
    if(empty($reservai)) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Campo reserva inicial vacío";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }
    
} else { 
    // if all the fields are filled (not empty) 	
    //insert data to database
    $result = mysqli_query($mysqli, "SELECT id_div FROM tb_divisas WHERE abrev='$abrev'");
    $existe = mysqli_num_rows($result);
    
    if($existe=0) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Divisa inexistente, intente nuevamente.";
        echo "</div>";
        echo "</div>";
        echo "</div>";
       
    } else {
      $result = mysqli_query($mysqli, "UPDATE tb_divisas SET reserva = $reservai WHERE abrev='$abrev'");
      echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-success' role='alert'>";
        echo "Reserva agregada satisfactoriamente.";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }	
    
    //display success message
    
    
}
echo "<br/><a class='btn btn-primary' href='index.php'>Inicio</a>";
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

   

