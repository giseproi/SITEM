<?
/***********************************************************************************************************************
  
								034.php

Este programa es software libre; usted lo puede distribuir o modificar bajo los t�rminos de la version 2 
de GNU - General Public License, tal como es publicada por Free Software Foundation

Este programa se distribuye con la esperanza de que sea �til pero SIN NINGUNA GARANT�A; 
sin garant�a impl�cita de COMERCIALIZACI�N o de USO PARA UN PROP�SITO EN PARTICULAR.

Por favor lea GNU General Public License para m�s detalles.

************************************************************************************************************************
* @subpackage   
* @package	
* @copyright     GPL
* @version      	1.0
* @author      	Sitem
* @link		http://gemini.udistrital.edu.co/comunidad/grupos/
************************************************************************************************************************/
$this->nivel=0;
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/cabecera.php');	
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/entidades_final/header_entidades.php');	

if(isset($_GET["essd"])){
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/entidades_final/047action.php');	

}else
	{

	if(isset($_GET["ess"])){
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/entidades_final/046action.php');	

	}else
		{
		if(!isset($_GET["es"]))
		{
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/entidades_final/044action.php');	

		}else
			{
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/entidades_final/045action.php');	
		}
}			
}
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/entidades_final/footer_entidades.php');
?>