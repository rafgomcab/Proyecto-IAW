<?php
//Conectamos con  la base de datos
require 'conexion.php';
//Realizamos la consulta de nuestra tabla para poder obtener los datos que hay guardados
$sql = "SELECT *  from clubDeportivo;";
//Ejecutamos la consulta
$resultado = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/jquery.dataTables.min.js" ></script>
		
		<title>LListado Pokemon</title>
		
		<script>
			// DataTables
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
		
</head>
<body>
    <h1>Esto es una prueba de que se sube a github</h1>
    <h2>subida 2</h2>
</body>
</html>