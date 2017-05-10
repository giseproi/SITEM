<?
/*** Classes***/
include('conexion_db.php');

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
$this->dbms='mysql';
$this->mensaje=$acceso_db->conectar_db($this->dbms);

/***
Imprimir identificadores de conexión

***/

echo $this->mensaje;
?>