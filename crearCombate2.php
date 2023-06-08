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
        $pokemon1="";
        $pokemon2="";
        $fecha=$_POST['fecha'];
        //inicializamos esta variable
        $poder1=0;
        $poder2=0;

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
            }
            while($fila2=$cons2->fetch_assoc()){
                $poder2= $fila2['ataque'] + $fila2['defensa'] + $fila2['velocidad'] + ($fila2['Nivel']/4);
                $pokemon2= $fila2['nombre'];
            }

            //Obtenemos las victorias y derrotas que tienen los pokemon participantes
            $vicpoke1 = "select combates_ganados from pokemon where nombre like '$pokemon1'";
            $resvicPoke1= $mysqli->query($vicpoke1);

            $vicpoke2 = "select combates_ganados from pokemon where nombre like '$pokemon2'";
            $resvicPoke2= $mysqli->query($vicpoke2);

            $derrpoke1 = "select combates_perdidos from pokemon where nombre like '$pokemon1'";
            $resderrpoke1 = $mysqli->query($derrpoke1);

            $derrpoke2 = "select combates_perdidos from pokemon where nombre like '$pokemon2'";
            $resderrpoke2 = $mysqli->query($derrpoke2);
            
            //Una vez obtenidas las victorias y derrotas de cada uno, actualizamos sus estadisticas.
            //Una vez tenemos las fuerzas comparamos los resultados
            if($poder1==$poder2){
                $ganador="Empate";
            } else if ($poder1>$poder2){
                $ganador=$pokemon1;
                $resvicPoke1+=1;
                $resderrpoke2+=1;
            } else {
                $ganador=$pokemon2;
                $resvicPoke2+=1;
                $resderrpoke1+=1;
            }
            //Elaboramos la sentencia SQL para insertar los datos en la base de datos
		    $sql= "INSERT INTO combates(idpk1, idpk2, pokemon1, pokemon2, fecha, ganador) values('$idpk1', '$idpk2', '$pokemon1', '$pokemon2', '$fecha', '$ganador')";
		    //Actualizamos los datos automáticamente mediante la sentencia.
            $sqlActuPoke1 = "update pokemon set combates_ganados = $resvicPoke1, combates_perdidos = $resderrPoke1 where nombre like '$pokemon1';";

            $sqlActuPoke2 = "update pokemon set combates_ganados = $resvicPoke2, combates_perdidos = $resderrPoke2 where nombre like '$pokemon2';";
            //Llevamos a cabo la consulta
		    $res = $mysqli->query($sql);


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