<html>
<head>
	<title>Cotiza Divisa</title>
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
</body>
</html>