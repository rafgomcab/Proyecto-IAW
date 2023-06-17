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

		//Guardamos las variables de nuestro formulario
		$ataque = $_POST['ataque'];
		$defensa = $_POST['defensa'];
		$velocidad = $_POST['velocidad'];
        $nivel = $_POST['nivel'];
        $especie = $_POST['especie'];
		$id=$_POST['id'];

		//Elaboramos la sentencia SQL para actualizar los datos en la base de datos
		$sql= "UPDATE pokemon set ataque = $ataque, defensa = $defensa, velocidad = $velocidad, Nivel = $nivel where id=$id";
		//Llevamos a cabo la consulta
		$res = $mysqli->query($sql);
		//Analizamos el resultado
		if($res>0){
            echo "<p class='alert alert-primary'>Estadísticas actualizadas</p>";
            echo "<p><a href='estadisticas.php?especie=$especie' class='btn btn-primary'>Regresar</a></p>";
        }else{
            echo "<p class=' alert alert-primary'>Error al insertar</p>";
            echo "<p><a href='estadisticas.php?especie=$especie' class='btn btn-primary'>Regresar</a></p>";
        }
			
			
		?>
	</body>
</html>				