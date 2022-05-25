<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserva Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'menu.php'; ?>

<div class="container mt-4">
	<div class="row" >
		 <h3> Reserva Inicial </h3>
		<div class="col-3">
		<form action="reservainicial.php" method="post" name="form2" >
			<div class="mb-3">
				<label for="abrev" class="form-label">Abreviatura de la Divisa</label>
				<input type="text" class="form-control" name="abrev" id="abrev" aria-describedby="abrevHelp">
				<div id="abrevHelp" class="form-text">Se requiere un identificador de 3 letras.</div>
			</div>
			<div class="mb-3">
				<label for="reservai" class="form-label">Reserva Inicial</label>
				<input type="text" class="form-control" id="reservai" name="reservai">
			</div>
			
			<button type="submit" name="submit" value="Update" class="btn btn-primary">Actualizar</button>
		</form>
		</div>
	</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

