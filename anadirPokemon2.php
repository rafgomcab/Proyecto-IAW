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
	<?php
	//Conectamos a la base de datos
	require 'conexion.php';

	//sentencia para comparar nombres
	$comparaN = "SELECT * from pokemon;";
	$resN = $mysqli->query($comparaN);

	//Guardamos las variables de nuestro formulario
	$nombre = $_POST['nombre'];
	$ataque = $_POST['ataque'];
	$defensa = $_POST['defensa'];
	$velocidad = $_POST['velocidad'];
	$nivel = $_POST['nivel'];
	$especie = $_POST['especie'];

	//variable para controlar que el nombre está o no 
	$encontrado = 0;

	//bucle para comprobar que el nombre introducido no está en la base de datos
	while ($fila = $resN->fetch_assoc()) {
		if ($nombre == $fila['nombre']) {
			$encontrado = 1;
		}
	}

	if ($encontrado == 1) {
		echo "<p class='alert alert-warning'>El Pokémon introducido ya existe en la base de datos.</p>";
		echo "<p><a href='anadirPokemon.php?especie=$especie' class='btn btn-warning'>Regresar</a></p>";
	} else {
		//Elaboramos la sentencia SQL para insertar los datos en la base de datos
		$sql = "INSERT INTO pokemon(nombre, especie, ataque, defensa, velocidad, Nivel) values('$nombre', '$especie', '$ataque', '$defensa', '$velocidad', '$nivel')";
		//Llevamos a cabo la consulta
		$res = $mysqli->query($sql);
		//Analizamos el resultado
		if ($res > 0) {
			echo "<p class='alert alert-primary'>Registro correcto</p>";
			echo "<p><a href='estadisticas.php?especie=$especie' class='btn btn-primary'>Regresar</a></p>";
		} else {
			echo "<p class=' alert alert-primary'>Error al insertar</p>";
			echo "<p><a href='estadisticas.php?especie=$especie' class='btn btn-primary'>Regresar</a></p>";
		}
	}





	?>
</body>

</html>