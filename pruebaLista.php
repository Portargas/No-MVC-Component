<?php

//insertamos con un require_once nuestra conexion a la BD

require_once('BBDD.php');

//llamamos al apartado getlistado() de nuestra pagina BBDD para que nos muestre el listado de todos los profesores

$result = BBDD::getlistado();

    while ($fila = $result->fetch()) {
		echo $fila['nombre'] ." ". $fila['apelidos'] ." </br> ";
		
		
		//llamamos al metodo getcategoria al cual le asignamos el valor que queremos buscar en la tabla categorias
        $res = BBDD::getcategoria($fila['categoria']);
			$categ = $res->fetch();
			echo $categ['nombre'] . " </br> ";
		
		
		
		//llamamos al metodo getdepartamentos al cual le asignamos el valor que queremos buscar en la tabla departamento
		$res2 = BBDD::getdepartamentos($fila["departamento"]);
			$dep = $res2->fetch();
			if(empty($dep["web"])){
			
				//si no tiene ponemos el texto de la UVIGO
				echo $dep['nombre'] ."</br>";
			
			}else{
				//insertamos el codigo necesario para que funcione el enlace, con el nombre del departamento como texto
				echo "<a href=".$dep["web"]." target='_blank'>".$dep['nombre'] ."</a> </br> ";
			}
			
			
		//llamamos al metodo getarea al cual le asignamos el valor que queremos buscar en la tabla area
		$res3 = BBDD::getarea($fila["area"]);
			$are = $res3->fetch();
			echo $are['nombre'] . " </br> ";
		
		
		
		//llamamos al metodo getcentros al cual le asignamos el valor que queremos buscar en la tabla centros
		$res4 = BBDD::getcentros($fila["direccion"]);
		
		//comprobamos que el valor de nuestra consulta no este vacio
		if(!empty($res4)){
			
			$direc = $res4->fetch();
			echo $direc['nombre'] . " </br> " . $direc['direccion'] . " </br> " . $direc['CP'] ."</br>";
			
		}else{
			
			//si esta vacio mostramos un salto de linea
			echo "</br>";
		}
		
		
		//comprobamos que contenga un enlace web 
		if(empty($fila["espazweb"])){
			
			//si no tiene ponemos el texto de la UVIGO
			echo "Espazo web en UVIGO </br>";
			
		}else{
			
			//insertamos el codigo necesario para que funcione el enlace
			echo "<a href='" . $fila['espazweb'] . "' target='_blank'> Espazo web en UVIGO </a> </br> ";
			
		}
		
		echo $fila['despacho'] . " </br> "; 
		echo $fila['email'] . " </br> "; 
		echo $fila['tlf'] . " </br> "; 
		echo $fila['linInv1'] .  " </br> "; 
		echo $fila['linInv2'] . " </br> "; 
		echo $fila['linInv3'] . " </br> "; 
		echo $fila['linInv4'] . " </br> "; 
		echo $fila['linInv5'] . " </br> ";

		
		//llamamos al metodo getgrupos al cual le asignamos el valor que queremos buscar en la tabla grupos
		$res5 = BBDD::getgrupos($fila["grupoInv"]);
		
		//comprobamos que el valor de nuestra consulta no este vacio
		if(empty($res5)){
			
			//si esta vacio mostramos un salto de linea
			echo $grup["nombre"]."<br/>";
			
		}else{
			
			$grup = $res5->fetch();
			if(!empty($grup["web"])){
			
				//insertamos el codigo necesario para que funcione el enlace, con el nombre del grupo de investigacion como texto
				echo "<a href=".$grup["web"]." target='_blank'>".$grup['nombre'] ."</a> </br> ";
			}else{
			
				//si no tiene ponemos el texto del grupo
				echo $grup['nombre'] ."</br>";
				
			}
		}	
		
		
			
		echo "</br></br>";	
		
		/* A 28/01/2017  
		$res = BBDD::getMarca($fila['id_marca']);
        $marca = $res->fetch();
        echo ucfirst($marca['nombre']) . " ";
        A 28/01/2017  */
	}                                
?>