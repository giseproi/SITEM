<?
/*** Classes***/
//Forma de incluir un archivo utilizando ruta absoluta:
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/conexion_db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/acceso_db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/seleccion_db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/usuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/sesion.php');

/*** 
Crear una instancia de acceso a base de datos
***/
$acceso_db=new conexion_db;

/***
Valores por defecto
***/
$acceso_db->atributos_iniciales();

/***
Atributos específicos: 
@NONE
***/

/***
Método para abrir una conexión a la base de interés
@dbms
***/
//El motor a utilizar es MySQL:

$this->dbms='mysql';
$this->enlace=$acceso_db->conectar_db($this->dbms);

if (is_resource($this->enlace)){
	//Busca una sesion
	$nueva_sesion=new sesiones;
	$nueva_sesion->especificar_enlace($this->enlace);
	$nueva_sesion->especificar_expiracion(1800);
	$esta_sesion=$nueva_sesion->sesion();
	
	//Si no existe crea una nueva
	if(!$esta_sesion){
		
		echo '<strong>No se ha encontrado una sesión válida.</strong><br>'; 
		$nueva_sesion->crear_sesion();
		
	}
		$resultado = $nueva_sesion->guardar_valor_sesion("nombre","Paulo Cesar");
		$registro=$nueva_sesion->rescatar_valor_sesion("nombre");

}else{

	echo $this->enlace.'<br>';


}



?>
