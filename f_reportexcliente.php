<html>
<head>
	<title>Reporte por Cliente</title>
</head>

<body>
	<?php 
	  include 'menu.php'; 
	  include_once("config.php");
	?>
	<div class="container mt-4">
		<div classcotiza="row" >
			 <h3>  Reporte por Cliente </h3>
			<div class="col-3">
			<form action="reportexcliente.php" method="post" name="form2" >
				<div class="mb-3">
					<label for="id_cliente" class="form-label">Nombre del Cliente</label>
				    <select name="id_cliente" class="form-select" aria-label="Default select example">
							<option selected>Seleccione un cliente</option>
							<?php
							$result = mysqli_query($mysqli, "SELECT id_cliente, nombre, apellidos FROM clientes WHERE activo=1 ORDER BY apellidos");
							while($res = mysqli_fetch_array($result)) { 
								echo "<option value='$res[0]'>$res[2]".' '."$res[1]</option>";
							}
							?>
					</select>
				</div>
				
				
				<button type="submit" name="submit" value="Update" class="btn btn-primary">Reporte</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>