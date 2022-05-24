<html>
<head>
	<title>Venta Divisa</title>
</head>

<body>
	<?php 
	  include 'menu.php'; 
	  include_once("config.php");
	?>
	<div class="container mt-4">
		<div classcotiza="row" >
			 <h3>  Venta Divisa </h3>
			<div class="col-3">
			<form action="venta.php" method="post" name="form2" >
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
				<div class="mb-3">
					<label for="abrev" class="form-label">Divisa</label>
					<select name="abrev" class="form-select" aria-label="Default select example">
							<option selected>Seleccione una divisa</option>
							<?php
							$result = mysqli_query($mysqli, "SELECT id_div, abrev FROM tb_divisas");
							while($res = mysqli_fetch_array($result)) { 
								echo "<option value='$res[1]'>$res[1]</option>";
							}
							?>
					</select>
				</div>
				<div class="mb-3">
					<label for="cantidad" class="form-label">Cantidad a vender</label>
					<input type="text" class="form-control" id="cantidad" name="cantidad">
				</div>
				
				<button type="submit" name="submit" value="Update" class="btn btn-primary">Vender</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>