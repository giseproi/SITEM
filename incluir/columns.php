<?
   	$this->cadena_select="SELECT * FROM usuario";
	$this->acceso_db->registro_db($this->cadena_select,0);
	$conteo_2=$this->acceso_db->obtener_conteo_db();
	echo $res->numCols();
?>