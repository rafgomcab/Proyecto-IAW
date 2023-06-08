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
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <title>Actualiza combate</title>

    <script>
        // DataTables
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>

</head>

<body>
    <?php
    //Conectamos con  la base de datos
    require 'conexion.php';
    //obtenemos el nombre individual de nuestros pokemons
    $ganador="";
    //Realizamos la consulta de nuestra tabla para poder obtener los ganadores que hay guardados
    $sql = "SELECT *  from combates;";
    //Ejecutamos la consulta
    $resultado = $mysqli->query($sql);

    //Realizamos la consulta que nos devuelve el nombre de todos los pokemon individuales. La duplicamos para poder actualizar más comodamente
    $sql2="select * from pokemon;";
    //La ejecutamos
    $resultado2= $mysqli->query($sql2);
    //Inicializamos los contadores de victorias y derrotas
    $victoria=0;
    $derrotas=0;
    //Me recorre cada nombre de cada pokemon para comprobar si ha ganado alguna vez y añadir eso al contador.
    while($fila2= $resultado2->fetch_assoc()){
        //necesitamos que de la vuelta mas veces asi que hacemos la consulta de nuevo
        $sql = "SELECT *  from combates;";
        $resultado = $mysqli->query($sql);
        
        while($fila=$resultado->fetch_assoc()){
            if($fila2['nombre']==$fila['pokemon1'] || $fila2['nombre']==$fila['pokemon2']){
                if($fila2['nombre']==$fila['ganador']){
                    $victoria= $victoria+1;
                    $ganador=$fila['ganador'];
                    
                } else {
                    $derrotas=$derrotas+1;
                }
                $actualizaV="update pokemon set combates_ganados='$victoria' where nombre like '$ganador'";
                $actualizaD="update pokemon set combates_perdidos='$derrotas' where nombre like '$ganador'";
                $resV=$mysqli->query($actualizaV);
                $resD=$mysqli->query($actualizaD);
            }
            echo $victoria;
            
        }
        
        $victoria=0;
        $derrotas=0;
        // $actualizaV="update pokemon set combates_ganados='$victoria' where nombre like '$ganador'";
        // $resV=$mysqli->query($actualizaV);
    }

    //Ahora que tenemos cuantas victorias y cuantas derrotas tiene cada pokemon, tendremos que actualizar la tabla pokemon
    if($resV>0){
        echo "<p class='alert alert-primary'>Se ha actualizado correctamente</p>";
        echo "<p><a href='combate.php' class='btn btn-primary'>Regresar</a></p>";
    }else{
        echo "<p class=' alert alert-primary'>Error al altualizar</p>";
        echo "<p><a href='combate.php' class='btn btn-primary'>Regresar</a></p>";
    }
    
          

    ?>
</body>