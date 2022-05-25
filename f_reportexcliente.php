<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte por Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

	