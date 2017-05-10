<?
/*** Classes***/
//Forma de incluir un archivo utilizando ruta absoluta:include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/db_admin.php');include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/db_admin.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/db_admin.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/usuario.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/sesion.class.php');

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

$acceso_db->registro_db('SELECT * FROM Control',0);
$registro=$acceso_db->obtener_registro_db();
$campos=count($registro).'<br>';
echo $campos;
for($i=0;$i<$campos;$i++){
	 echo "\n<tr>\n<td style=\"width: 216px;\">".$registro[$i][1]."\n</td>\n<td style=\"width: 336px;\"><input maxlength=\"5\" size=\"5\" name=\"".$registro[$i][1]."\">\n</td>\n</tr>";
	}








?>