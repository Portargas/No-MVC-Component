<?php


	//creamos una clase llamada BBDD donde crearemos diversas funciones que utilizaremos mas adelante
	
	class BBDD{
		
		protected static function ejecutaQuery($sql) {
			$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
				 
			//conectamos con el servidor con su usuario y contraseña	 
				 
			$dsn = "mysql:host=localhost;dbname=prueba";        
			$usuario = 'root';
			$contrasena = '';

			$dwes = new PDO($dsn, $usuario, $contrasena, $opc);
			$resultado = null;
			
			if (isset($dwes)){
				$resultado = $dwes->query($sql);
				$dwes = null;
				return $resultado;
			}	
		}
		
		protected static function ejecutaUpdate($sql) {
			$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			/*$dsn = "mysql:host=localhost;dbname=arinfo";
			$usuario = 'root';
			$contrasena = '';*/
			$dsn = "mysql:host=arinfoweb.com;dbname=arinfoes_db";        
			$usuario = 'arinfoes_marta';
			$contrasena = 'marta';
			

			$dwes = new PDO($dsn, $usuario, $contrasena, $opc);
			$resultado = -1;        
			$resultado = $dwes->exec($sql);
			//si pasamos los mismos valores a un udpate, devolvería 0 affected rows pero estaría ok
			//así que comprobamos si se ejecutó bien o mal
			$done = $resultado !== false ? true : false;
			
			return $done;
		} 
		
		
		public static function getlistado(){
			
			//creamos la sentencia para crear un listado
			$sql = "SELECT * FROM profesor ORDER BY apelidos";
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
			
		}
		
		public static function getficha($idprof){
			
			//creamos la sentencia para crear un listado de cada profesor
			$sql = "SELECT * FROM profesor WHERE id =". $idprof;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
			
		}
		
			///////////////
			//METODOS GET//
			///////////////
		
		public static function getcategoria($idcat) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de la categoria
			
			$sql = "SELECT * FROM categoria WHERE idcat=".$idcat;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function getarea($idarea) {
			
			//Seleccionamos todos los campos donde nos coincida con el id del area
			
			$sql = "SELECT * FROM areas WHERE idarea=".$idarea;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function getdepartamentos($idepar) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de los departamentos
			
			$sql = "SELECT * FROM departamentos WHERE idepar=".$idepar;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function getcentros($idcen) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de los centros
			
			$sql = "SELECT * FROM centros WHERE idcen=".$idcen;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function getgrupos($idgrup) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de los grupos
			
			$sql = "SELECT idgrup, nombre, web FROM grupos_investigacion WHERE idgrup=".$idgrup;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
			///////////////
			//METODOS update//
			///////////////
		
		public static function setprofesor($nom, $apel, $idprof){
			
			//Seleccionamos todos los campos donde nos coincida con el id de la categoria
			
			$sql = "update profesor set nombre= '".$nom."', apelidos ='".$apel."' where id ='".$idprof."'";
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function setarea($idarea, $nomArea, $codArea) {
			
			//Seleccionamos todos los campos donde nos coincida con el id del area
			
			$sql = "update profesor set nombre= '".$nomArea."', codigo ='".$codArea."' where id ='".$idarea."'";
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function setdepartamentos($idepar) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de los departamentos
			
			$sql = "SELECT * FROM departamentos WHERE idepar=".$idepar;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function setcentros($idcen) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de los centros
			
			$sql = "SELECT * FROM centros WHERE idcen=".$idcen;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
		public static function setgrupos($idgrup) {
			
			//Seleccionamos todos los campos donde nos coincida con el id de los grupos
			
			$sql = "SELECT idgrup, nombre, web FROM grupos_investigacion WHERE idgrup=".$idgrup;
			$resultado = self::ejecutaQuery($sql);

			return $resultado;
		}
		
	}
?>