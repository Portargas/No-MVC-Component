<?php

//insertamos con un require_once nuestra conexion a la BD

require_once('BBDD.php');

//llamamos al apartado getlistado() de nuestra pagina BBDD para que nos muestre el listado de todos los profesores

$result = BBDD::getlistado();
	
    while ($fila = $result->fetch()) {
		echo  "<a href= ' ficha.php?id=". $fila["id"] ." ' >". $fila['apelidos'] . " " . $fila['nombre'] . "</a> </br> ";
			
		echo "</br></br>";	
	}                                
?>