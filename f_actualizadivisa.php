<html>
<head>
	<title>Agregar Divisa</title>
</head>

<body>
	<?php include 'menu.php'; ?>

	<div class="container mt-4">
		<div class="row" >
			 <h3> Actualiza Divisa </h3>
			<div class="col-3">
			<form action="actualizadivisa.php" method="post" name="form2" >
				<div class="mb-3">
					<label for="abrev" class="form-label">Abreviatura de la Divisa</label>
					<input type="text" class="form-control" name="abrev" id="abrev" aria-describedby="abrevHelp">
					<div id="abrevHelp" class="form-text">Se requiere un identificador de 3 letras.</div>
				</div>
				<div class="mb-3">
					<label for="valor" class="form-label">Valor</label>
					<input type="text" class="form-control" id="valor" name="valor">
				</div>
				
				<button type="submit" name="submit" value="Update" class="btn btn-primary">Actualizar</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>