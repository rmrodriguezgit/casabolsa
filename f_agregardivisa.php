<html>
<head>
	<title>Agregar Divisa</title>
</head>

<body>
	<?php include 'menu.php'; ?>

	<div class="container mt-4">
		<div class="row" >
			 <h3> Agregar Divisas </h3>
			<div class="col-3">
			<form action="agregardivisa.php" method="post" name="form1" >
				<div class="mb-3">
					<label for="abrev" class="form-label">Abreviatura de la Divisa</label>
					<input type="text" class="form-control" name="abrev" id="abrev" aria-describedby="abrevHelp">
					<div id="abrevHelp" class="form-text">Se requiere un identificador de 3 letras.</div>
				</div>
				<div class="mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion">
				</div>
				
				<button type="submit" name="submit" value="Add" class="btn btn-primary">Agregar</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>