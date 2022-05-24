<!doctype html>
<html lang="es">
  <head>
   
    <title>Agregar Divisa</title>
  </head>
  <body>
   
    <?php include 'menu.php'; ?>
    

    <?php
//including the database connection file
include_once("config.php");

if(isset($_POST['submit'])) {	
    $abrev = mysqli_real_escape_string($mysqli, $_POST['abrev']);
	$descripcion = mysqli_real_escape_string($mysqli, $_POST['descripcion']);
	// checking empty fields
	if(empty($abrev) || empty($descripcion) ) {
				
		if(empty($abrev)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
            //echo "<script>alert('Campo abreviatura vacío');</script>";
			echo "Campo abreviatura vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
		}
		
		if(empty($descripcion)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
			echo "Campo descripción vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
			
		}
		
	} else { 
		// if all the fields are filled (not empty) 	
		//insert data to database
        $result = mysqli_query($mysqli, "SELECT id_div FROM tb_divisas WHERE abrev='$abrev'");
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
          $result = mysqli_query($mysqli, "INSERT INTO tb_divisas(abrev,descripcion) VALUES('$abrev','$descripcion')");
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



