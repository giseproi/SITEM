<?
/*** Classes***/
//Forma de incluir un archivo utilizando ruta absoluta:
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/maf_controles.class.php');

/*** 
Crear una instancia de acceso a base de datos
***/


$propiedades['max_tamanno']=3;
$propiedades['valor']='Demasiado';
$propiedades['tamanno']=3;
$propiedades['deshabilitado']=1;
$propiedades['lectura']=0;
$propiedades['posicion']=3;
$propiedades['nombre']=1;
$propiedades['etiqueta']="esta sería una etiqueta un poco grande pero no es tan grande control:";
$control=new maf_controles;
$this->texto=$control->encabezado_tabla($propiedades);
echo $this->texto;
$this->texto=$control->cuadro_texto($propiedades);
echo $this->texto;
$this->texto=$control->cuadro_clave($propiedades);
echo $this->texto;
$this->texto=$control->cuadro_seleccion($propiedades);
echo $this->texto;
$this->texto=$control->boton_radial($propiedades);
echo $this->texto;
$this->texto=$control->cuadro_archivo($propiedades);
echo $this->texto;



?>



