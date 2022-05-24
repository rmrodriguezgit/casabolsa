<!doctype html>
<html lang="es">
  <head>
    
    <title>Venta Divisa</title>
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
			echo "Venta registrada <br/>";
            echo "Cliente ID:".$id_cliente."<br/>";
            echo $abrev." ".$res[0]." * ".$valor." = $".$res[1]." MNX";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            $result = mysqli_query($mysqli, "INSERT INTO tb_venta_divisas 
                                        (id_cliente,abrev,valor,cantidad,total,fecha_act,tipo_operacion)
                                        VALUES ('$id_cliente','$abrev',$res[0],$cantidad,$res[0]*$cantidad,now(),1)");

            $result = mysqli_query($mysqli, "UPDATE tb_divisas SET reserva = reserva - $cantidad  WHERE abrev='$abrev'");
        
		//display success message
        
		
	}
    echo "<br/><a class='btn btn-primary' href='index.php'>Inicio</a>";
}
?>


</body>
</html>



