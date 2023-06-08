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
        $idpk1=$_POST['contrincante1'];
        $idpk2=$_POST['contrincante2'];
        $fecha=$_POST['fecha'];
        //inicializamos esta variable
        $poder1=0;
        $poder2=0;
        $victorias1=0;
        $victorias2=0;
        $derrotas1=0;
        $derrotas2=0;
        //Añadimos la excepción de si los dos contrincantes fueran el mismo
        if($idpk1==$idpk2){
            echo "<p class=' alert alert-danger'>Error al insertar. No puede combatirse a si mismo</p>";
            echo "<p><a href='crearCombate.php' class='btn btn-primary'>Regresar al combate</a></p>";
        } else {
            //Calculamos cuál sería el ganador
            //Creamos dos consultas una para cada adversario
            $datos1="select * from pokemon where id like '$idpk1';";
            $datos2="select * from pokemon where id like '$idpk2';";
            //Ejecutamos las consultas
            $cons1=$mysqli->query($datos1);
            $cons2=$mysqli->query($datos2);
            //Creamos un valor de la fuerza de cada contrincante. 
            //Esta fuerza será la suma de Ataque, Defensa, Velocidad y el nivel dividido por 4
            while($fila=$cons1->fetch_assoc()){
                $poder1= $fila['ataque'] + $fila['defensa'] + $fila['velocidad'] + ($fila['Nivel']/4);
                $pokemon1= $fila['nombre'];
                $victorias1=$fila['combates_ganados'];
                $derrotas1=$fila['combates_perdidos'];
            }

            
            while($fila2=$cons2->fetch_assoc()){
                $poder2= $fila2['ataque'] + $fila2['defensa'] + $fila2['velocidad'] + ($fila2['Nivel']/4);
                $pokemon2= $fila2['nombre'];
                $victorias2=$fila2['combates_ganados'];
                $derrotas2=$fila2['combates_perdidos'];
            }

            
            //Una vez obtenidas las victorias y derrotas de cada uno, actualizamos sus estadisticas.
            //Una vez tenemos las fuerzas comparamos los resultados
            if($poder1==$poder2){
                $ganador="Empate";
            } else if ($poder1>$poder2){
                $ganador=$pokemon1;
                $victorias1=$victorias1+1;
                $derrotas2=$derrotas2+1;
               
            } else {
                $ganador=$pokemon2;
                $derrotas1=$derrotas1+1;
                $victorias2=$victorias2+1;
            
            }
            //Elaboramos la sentencia SQL para insertar los datos en la base de datos
		    $sql= "INSERT INTO combates(idpk1, idpk2, pokemon1, pokemon2, fecha, ganador) values('$idpk1', '$idpk2', '$pokemon1', '$pokemon2', '$fecha', '$ganador')";
		    //Actualizamos los datos automáticamente mediante la sentencia.
            $sqlActuPoke1 = "UPDATE pokemon set combates_ganados = $victorias1, combates_perdidos = $derrotas1 where id like '$idpk1';";

            $sqlActuPoke2 = "UPDATE pokemon set combates_ganados = $victorias2, combates_perdidos = $derrotas2 where id like '$idpk2';";
            //Llevamos a cabo la consulta
		    $res = $mysqli->query($sql);
            $resActu1= $mysqli->query($sqlActuPoke1);
            $resActu2=$mysqli->query($sqlActuPoke2);

		    //Analizamos el resultado
    
		    if($res>0){
                echo "<p class='alert alert-primary'>Resultado: $ganador</p>";
                echo "<p><a href='combate.php' class='btn btn-primary'>Regresar</a></p>";
            }else{
                echo "<p class=' alert alert-primary'>Error al insertar</p>";
                echo "<p><a href='combate.php' class='btn btn-primary'>Regresar</a></p>";
            }
        }
    
		?>

	</body>
</html>