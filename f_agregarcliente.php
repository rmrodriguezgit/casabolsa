<html>
<head>
	<title>Agregar Cliente</title>
</head>

<body>
	<?php include 'menu.php'; ?>

	<div class="container mt-4">
		<div class="row" >
			 <h3> Agregar Cliente </h3>
			<div class="col-3">
			<form action="agregarcliente.php" method="post" name="form1" >
			<div class="mb-3">
					<label for="abrev" class="form-label">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" >
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">Apellidos</label>
					<input type="text" class="form-control" name="apellidos" id="apellidos" >
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">Email</label>
					<input type="text" class="form-control" name="email" id="email" >
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">RFC</label>
					<input type="text" class="form-control" name="rfc" id="rfc" >
				</div>
                <div class="mb-3">
					<label for="abrev" class="form-label">INE</label>
					<input type="text" class="form-control" name="ine" id="ine" >
				</div>
				
				<button type="submit" name="submit" value="Add" class="btn btn-primary">Agregar</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>