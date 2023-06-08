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
							<input type="text" name="nombre" class="form-control" id="formGroupExampleInput" placeholder="Introduce el nombre">
						</div>
						
						<div class="form-group">
							<!-- tipo1 -->
							<label for="tipo1">Tipo 1: </label>
							<input type="text" name="tipo1" class="form-control" id="formGroupExampleInput" placeholder="Introduce el primer tipo">
						</div>
						
						<div class="form-group">
							<!-- tipo2 -->
							<label for="tipo2">Tipo 2: </label>
							<input type="text" name="tipo2" class="form-control"  placeholder="Introduce el segundo tipo">
						</div>
						
						<div class="form-group">
							<!-- region -->
							<label for="region">Región: </label>
							<input type="text" name="region" class="form-control"  placeholder="Introduce la región">
						</div>
						
						<div class="form-group">
							<!-- Registrar -->
							<input type="submit" value="Registrar Pokémon" name="registrar" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>				