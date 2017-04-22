<?php
//insertamos con un require_once nuestra conexion a la BD

require_once('BBDD.php');
//guardamos la bariable que necesitamos para buscar al profesor
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
//llamamos al apartado getficha() de nuestra pagina BBDD para que nos muestre el listado del profesor

$result = BBDD::getficha($id);

?>
<html>
    <body >
<?php

    while ($fila = $result->fetch()) {
		
		?>
		
		<form action="consultas.php" method="POST">
		
			<p>Nombre</p>
			<input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"/>
			
			<p>Apellidos</p>
			<input type="text" name="apelido" value="<?php echo $fila['apelidos']; ?>"/>
			
			<input type="hidden" name="idprof" value="<?php echo $fila['id'];?>"/>
		<?php
		
		//llamamos al metodo getcategoria al cual le asignamos el valor que queremos buscar en la tabla categorias
        $res = BBDD::getcategoria($fila['categoria']);
		
		$categ = $res->fetch();
			
		?>
		
			<p>Categoria</p>
			
			<input type="text" name="categoria" value="<?php echo $categ['nombre']; ?>"/>
	
		<?php
		
		//llamamos al metodo getdepartamentos al cual le asignamos el valor que queremos buscar en la tabla departamento
		$res2 = BBDD::getdepartamentos($fila["departamento"]);
			$dep = $res2->fetch();
			
			
			if(empty($dep["web"])){
			
				//si no tiene ponemos el texto de la UVIGO
				echo $dep['nombre'] ."</br>";
			
			}else{
				//insertamos el codigo necesario para que funcione el enlace, con el nombre del departamento como texto
				echo "</br></br> <a href=".$dep["web"]." target='_blank'>".$dep['nombre'] ."</a> </br> ";
			}
			
			
		//llamamos al metodo getarea al cual le asignamos el valor que queremos buscar en la tabla area
		$res3 = BBDD::getarea($fila["area"]);
			$are = $res3->fetch();
			
		?>
			<p>Area</p>
			
			<input type="text" name="area" value="<?php echo $are['nombre']; ?>"/>
			</br>
		<?php
			
			echo "</br> ";
	
		//llamamos al metodo getcentros al cual le asignamos el valor que queremos buscar en la tabla centros
		$res4 = BBDD::getcentros($fila["direccion"]);
		
		//comprobamos que el valor de nuestra consulta no este vacio
		if(!empty($res4)){
			
			$direc = $res4->fetch();
			
		?>
			<p>Direccion</p>
			
			<input type="text" name="direccion" value="<?php echo $direc['nombre'] . " " . $direc['direccion'] . " " . $direc['CP']; ?>"/>
			</br>
		<?php

		}else{
			
			//si esta vacio mostramos un salto de linea
			echo "</br>";
		}
		
		?>
			<p>Espazo Web</p>
		<?php
		
		//comprobamos que contenga un enlace web 
		if(empty($fila["espazweb"])){
			
			//si no tiene ponemos el texto de la UVIGO
			echo "Espazo web en UVIGO </br>";
			
		}else{

			//insertamos el codigo necesario para que funcione el enlace
			echo " <a href='" . $fila['espazweb'] . "' target='_blank'> Espazo web en UVIGO </a> </br> ";
			
		}
		?>
			<p>Despacho</p>
			
			<input type="text" name="despacho" value="<?php echo $fila['despacho']; ?>"/>
			</br>
			
			<p>Email</p>
			
			<input type="text" name="email" value="<?php echo $fila['email']; ?>"/>
			</br>
			
			<p>Teléfono</p>
			
			<input type="text" name="telefono" value="<?php echo $fila['tlf']; ?>"/>
			</br>
			
			<p>Lineas de investigación</p>
			<ul>
				<li><input type="text" name="l1" value="<?php echo $fila['linInv1']; ?>"/></li>
				<li><input type="text" name="l2" value="<?php echo $fila['linInv2']; ?>"/></li>
				<li><input type="text" name="l3" value="<?php echo $fila['linInv3']; ?>"/></li>
				<li><input type="text" name="l4" value="<?php echo $fila['linInv4']; ?>"/></li>
				<li><input type="text" name="l5" value="<?php echo $fila['linInv5']; ?>"/></li>
			</ul>
		
		
		<?php
		
		echo "</br>";

		//llamamos al metodo getgrupos al cual le asignamos el valor que queremos buscar en la tabla grupos
		$res5 = BBDD::getgrupos($fila["grupoInv"]);
		
		?>
		
			<p>Grupo de Investigación</p>	
		<?php
		
		//comprobamos que el valor de nuestra consulta no este vacio
		if(empty($res5)){
			
			//si esta vacio mostramos un salto de linea
			echo "<br/>";
			
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
	
	}                                
?>

	<a href="ficha.php">volver</a>
	<br/>
	<br/>
	<input type="submit" name="editar" value="enviar">
	
	</form>
        
    </body>
</html>
