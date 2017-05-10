<?php
class base_datos
{
    // Abrir una conexion a la base de datos-- persistente
    var $enlace, $base, $var;
    function conectar() //función para conectar la base de datos
    {
        $this->enlace = mysql_connect("localhost", "telemedicina", "Gabc7Gu5");
        if (!$this->enlace)
		{
            return 0;
            exit;
        } ;
        return $this->enlace;
    } 
    function abrir($enlace, $nombre)
    { 
        // Seleccionar la base de datos
        $this->base = mysql_select_db($nombre);
        if (!($this->base))
		{
            return 0;
            exit;
        } ;
        return $this->base;
    } 
	function variable($var) // función para cambiar números por letras
	{
		$this->nomvar=$var;
	switch ($this->nomvar)
		{
			case 0:
					$var="cero";
				break;
			case 1:
					$var="uno";
				break;
			case 2:
					$var="dos";
				break;
			case 3:
					$var="tres";
				break;
			case 4:
					$var="cuatro";
				break;
			case 5:
					$var="cinco";
				break;
		}
	return $var;
	}
} 
//Aqui termina la clase
?>