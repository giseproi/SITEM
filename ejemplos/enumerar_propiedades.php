<?
/*** Classes***/
//Forma de incluir un archivo utilizando ruta absoluta:
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/db_admin.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/usuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/sesion.php');

/*** 
Crear una instancia de acceso a base de datos
***/
$acceso_db=new db_admin;

/***
Atributos específicos: 
@NONE
***/

/***
Método para abrir una conexión a la base de interés
@dbms
***/
//El motor a utilizar es MySQL (por defecto)

$this->enlace=$acceso_db->conectar_db();

$acceso_db->registro_db('SELECT * FROM Propiedad',0);
$registro=$acceso_db->obtener_registro_db();
$campos=count($registro).'<br>';
echo $campos;
for($i=0;$i<$campos;$i++){
		echo '$this->las_propiedades['.$i.']="'.$registro[$i][1].'";<br>';
	}








?>