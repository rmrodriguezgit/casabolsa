<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
   
  <?php include 'menu.php'; ?>

<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {	
$id_cliente = mysqli_real_escape_string($mysqli, $_POST['id_cliente']);

$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
$apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$rfc = mysqli_real_escape_string($mysqli, $_POST['rfc']);
$ine = mysqli_real_escape_string($mysqli, $_POST['ine']);	

// checking empty fields
if(empty($nombre) || empty($apellidos) || empty($email) || empty($rfc) || empty($ine)) {	
    
if(empty($nombre)) {
    echo "<div class='row'>";
    echo "<div class='col-3'>";
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Campo nombre vacío";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

if(empty($apellidos)) {
    echo "<div class='row'>";
    echo "<div class='col-3'>";
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Campo apellidos vacío";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

if(empty($email)) {
    echo "<div class='row'>";
    echo "<div class='col-3'>";
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Campo email vacío";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

if(empty($ine)) {
    echo "<div class='row'>";
    echo "<div class='col-3'>";
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Campo ine vacío";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

if(empty($rfc)) {
    echo "<div class='row'>";
    echo "<div class='col-3'>";
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Campo rfc vacío";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
    
} else { 
    // if all the fields are filled (not empty) 	
    //insert data to database
    $result = mysqli_query($mysqli, "SELECT id_cliente FROM clientes WHERE ine='$ine'");
    $existe = mysqli_num_rows($result);
    
    if($existe>0) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Registro existente, intente nuevamente.";
        echo "</div>";
        echo "</div>";
        echo "</div>";
       
    } else {
      $result = mysqli_query($mysqli, "INSERT INTO clientes (nombre, apellidos, email, rfc, ine)  
                                            VALUES('$nombre','$apellidos','$email','$rfc','$ine')");
      echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-success' role='alert'>";
        echo "Registro agregado satisfactoriamente.";
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



