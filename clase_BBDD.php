<?php
class BBDD 
{

public $db;

	
public function crear_conexion($ruta_config) {
	require_once($ruta_config);
	
	$this -> db = mysqli_connect($db_host, $db_usuario, $db_clave, $db_nombre);

	return $this -> db;
	}
	
public function cerrar_conexion() {
	mysqli_close($this -> db);
	}
}
?>
