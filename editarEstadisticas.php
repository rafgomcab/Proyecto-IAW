<?php
//Obtenemos todos los campos con los datos desde estadisticas
$nombre=$_GET['nombre'];
$especie = $_GET['especie'];
$ataque=$_GET['ataque'];
$defensa=$_GET['defensa'];
$nivel=$_GET['Nivel'];
$velocidad=$_GET['velocidad'];
$id=$_GET['id'];
?>
<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Añadir Pokemon</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Añadir Pokemon entrenado</h1>
		</div>

		<div class="row">
			<div class="col-md-8">
				<!-- Completar atributos de form -->
				<form id="registro" name="registro" method="post" action="editarEstadisticas2.php" autocomplete="off">

                <input type="hidden" name="id" value=<?php echo $id ?>>
                <input type="hidden" name="especie" value=<?php echo $especie ?>>


					<div class="form-group">
						<!-- Nombre -->
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" class="form-control" id="formGroupExampleInput" value=<?php echo $nombre ?> required disabled>
					</div>

					<div class="form-group">
						<!-- tipo1 -->
						<label for="ataque">Ataque: </label>
						<input type="number" name="ataque" class="form-control" id="formGroupExampleInput" value=<?php echo $ataque ?> max="10" min="1" required >
					</div>

					<div class="form-group">
						<!-- tipo2 -->
						<label for="defensa">Defensa: </label>
						<input type="number" name="defensa" class="form-control" id="formGroupExampleInput" value=<?php echo $defensa ?> max="10" min="1" required >
					</div>

					<div class="form-group">
						<!-- region -->
						<label for="region">Velocidad: </label>
						<input type="number" name="velocidad" class="form-control" id="formGroupExampleInput" value=<?php echo $velocidad ?> max="10" min="1" required >
					</div>

					<div class="form-group">
						<!-- region -->
						<label for="nivel">Nivel: </label>
						<input type="number" name="nivel" class="form-control" id="formGroupExampleInput" value=<?php echo $nivel ?> max="100" min="1" required >
					</div>

					<div class="row" style="display:flex; justify-content: space-between" ;>
						<div class="form-group">
							<!-- Registrar -->
							<input type="submit" value="Añadir Pokemon" name="registrar" class="btn btn-primary">
						</div>
						<!-- Registrar -->
						<div class="row">

							<p><a href="estadisticas.php?especie=<?php echo $especie?>" class="btn btn-warning">Regresar</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>