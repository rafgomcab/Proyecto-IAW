<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Registro de Pokemon</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Registro de Pokemon</h1>
		</div>

		<div class="row">
			<div class="col-md-8">
				<!-- Completar atributos de form -->
				<form id="registro" name="registro" method="post" action="registrarPokemon2.php" autocomplete="off">

					<div class="form-group">
						<!-- Nombre -->
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" class="form-control" id="formGroupExampleInput" placeholder="Introduce el nombre" required>
					</div>

					<div class="form-group">
						<!-- tipo1 -->
						<label for="tipo1">Tipo 1: </label>
						<select name="tipo1" id="tipo1" class="custom-select" required>
							<option value=" ">Ninguno</option>
							<option value="Agua">Agua</option>
							<option value="Hielo">Hielo</option>
							<option value="Tierra">Tierra</option>
							<option value="Fuego">Fuego</option>
							<option value="Eléctrico">Eléctrico</option>
						</select>


					</div>

					<div class="form-group">
						<!-- tipo2 -->
						<label for="tipo2">Tipo 2: </label>
						<select name="tipo2" id="tipo2" class="custom-select" required>
							<option value=" ">Ninguno</option>
							<option value="Agua">Agua</option>
							<option value="Hielo">Hielo</option>
							<option value="Tierra">Tierra</option>
							<option value="Fuego">Fuego</option>
							<option value="Eléctrico">Eléctrico</option>
						</select>
					</div>

					<div class="form-group">
						<!-- region -->
						<label for="region">Región: </label>
						<select name="region" id="region" class="custom-select" required>
							<option value="Kanto">Kanto</option>
							<option value="Johto">Johto</option>
							<option value="Hoenn">Hoenn</option>

						</select>
					</div>



					<div class="row" style="display:flex; justify-content: space-between" ;>
						<div class="form-group">
							<!-- Registrar -->
							<input type="submit" value="Registrar Pokémon" name="registrar" class="btn btn-primary">
						</div>
						<!-- Registrar -->
						<div class="row">

							<p><a href="pokemon.php" class="btn btn-warning">Regresar</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>