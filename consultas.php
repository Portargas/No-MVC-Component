<?php
require_once('BBDD.php');



if(isset($_POST["editar"])){
	
	$nomprof = $_POST["nombre"];
	$apelidos = $_POST["apelido"];
	$id = $_POST["idprof"];
	
	//hacemos la conexion con el metodo update profesor y le pasamos los parametros
	
	$result = BBDD::setprofesor($nomprof, $apelidos, $id);

	if (!$result){ 
		//el update devuelve false si hubo algún error
        $respuesta = false;
        $msj_error = "Error actualizando artículo.";
    }
	
	$accion='update'; 
	echo  "<a href= ' ficha.php?id=". $id ." ' ></a> </br> ";
	
	header("Location: ficha.php?id=".$id); 
}

/*if ($success){
        if ($action=='update'){
            //si hizo una actualizacion correcta nos aparece el perfil del profesor
            header("Location: ficha.php?id=".$id); 
        }else{
           header("Location: ficha.php?id=".$id); 
        }
    }else{
        echo $msj_error;//grabar msj de error para mostrar
    }

*/
?>