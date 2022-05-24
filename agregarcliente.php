<!doctype html>
<html lang="es">
  <head>
   
    <title>Agregar Cliente</title>
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


</body>
</html>



