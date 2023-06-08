<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Registro Pokémon</title>
	</head>
	<body>
		<?php
		//Conectamos a la base de datos
		require 'conexion.php';
		//Guardamos las variables de nuestro formulario
        $contrincante1=$_POST['contrincante1'];
        $contrincante2=$_POST['contrincante2'];
        $fecha=$_POST['fecha'];

        $poder1=0;
        $poder2=0;

        //Añadimos la excepción de si los dos contrincantes fueran el mismo
        if($contrincante1==$contrincante2){
            echo "<p class=' alert alert-danger'>Error al insertar. No puede combatirse a si mismo</p>";
            echo "<p><a href='crearCombate.php' class='btn btn-primary'>Regresar al combate</a></p>";
        } else {
            //Calculamos cuál sería el ganador
            //Creamos dos consultas una para cada adversario
            $datos1="select * from pokemon where nombre like '$contrincante1';";
            $datos2="select * from pokemon where nombre like '$contrincante2';";
            //Ejecutamos las consultas
            $cons1=$mysqli->query($datos1);
            $cons2=$mysqli->query($datos2);
            //Creamos un valor de la fuerza de cada contrincante. 
            //Esta fuerza será la suma de Ataque, Defensa, Velocidad y el nivel dividido por 4
            while($fila=$cons1->fetch_assoc()){
                $poder1= $fila['ataque'] + $fila['defensa'] + $fila['velocidad'] + ($fila['Nivel']/4);
            }
            while($fila2=$cons2->fetch_assoc()){
                $poder2= $fila2['ataque'] + $fila2['defensa'] + $fila2['velocidad'] + ($fila2['Nivel']/4);
            }
            //Una vez tenemos las fuerzas comparamos los resultados
            if($poder1==$poder2){
                $ganador="Empate";
            } else if ($poder1>$poder2){
                $ganador=$contrincante1;
            } else {
                $ganador=$contrincante2;
            }
            //Elaboramos la sentencia SQL para insertar los datos en la base de datos
		    $sql= "INSERT INTO combates(pokemon1, pokemon2, fecha, ganador) values('$contrincante1', '$contrincante2', '$fecha', '$ganador')";
		    //Llevamos a cabo la consulta
		    $res = $mysqli->query($sql);
		    //Analizamos el resultado
		    if($res>0){
                echo "<p class='alert alert-primary'>Ha ganado $ganador</p>";
                echo "<p><a href='combate.php' class='btn btn-primary'>Regresar</a></p>";
            }else{
                echo "<p class=' alert alert-primary'>Error al insertar</p>";
                echo "<p><a href='combate.php' class='btn btn-primary'>Regresar</a></p>";
            }
        }

		
			
			
		?>

	</body>
</html>