<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

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
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE clientes SET nombre='$nombre',apellidos='$apellidos',email='$email',
                                                             rfc='$rfc', ine='$ine'
                                         WHERE id_cliente=$id_cliente");
		
		//redirectig to the display page. In our case, it is index.php
        
         header('Location: verclientes.php');
	}
}
?>
<?php
//getting id from url
$id_cliente = $_GET['id_cliente'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM clientes WHERE id_cliente=$id_cliente");

while($res = mysqli_fetch_array($result))
{
	$nombre = $res['nombre'];
    $apellidos = $res['apellidos'];
    $email = $res['email'];
    $rfc = $res['rfc'];
    $ine = $res['ine'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
   <?php include 'menu.php'; ?>
    
	
	
	<form name="form1" method="post" action="clientes.php">
    <div class="container mt-4">
		<div class="row" >
			 <h3> Edita Cliente </h3>
			<div class="col-3">
			<form action="clientes.php" method="post" name="form1" >
				<div class="mb-3">
					<label for="abrev" class="form-label">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre;?>">
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">Apellidos</label>
					<input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos;?>">
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>">
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">RFC</label>
					<input type="text" class="form-control" name="rfc" id="rfc" value="<?php echo $rfc;?>">
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">INE</label>
					<input type="text" class="form-control" name="ine" id="ine" value="<?php echo $ine;?>">
				</div>
                <tr>
				<td><input type="hidden" name="id_cliente" value=<?php echo $_GET['id_cliente'];?>></td>
			</tr>
				
				<button type="submit" name="update" value="Update" class="btn btn-primary">Actualizar</button>
			</form>
			</div>
		</div>
	</div>
	</form>
</body>
</html>

