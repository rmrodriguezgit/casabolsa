<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cotiza Divisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php 
	  include 'menu.php'; 
	  include_once("config.php");

	  $result = mysqli_query($mysqli, "SELECT id_div, abrev FROM tb_divisas");
	?>
	<div class="container mt-4">
		<div classcotiza="row" >
			 <h3>  Cotiza Divisa </h3>
			<div class="col-3">
			<form action="cotiza.php" method="post" name="form2" >
				<div class="mb-3">
					<select name="abrev" class="form-select" aria-label="Default select example">
							<option selected>Seleccione una divisa</option>
							<?php
							while($res = mysqli_fetch_array($result)) { 
								echo "<option value='$res[1]'>$res[1]</option>";
							}
							?>
					</select>
				</div>
				<div class="mb-3">
					<label for="valor" class="form-label">Cantidad a Cotizar</label>
					<input type="text" class="form-control" id="valor" name="valor">
				</div>
				
				<button type="submit" name="submit" value="Update" class="btn btn-primary">Actualizar</button>
			</form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
