<?
/***********************************************************************************************************************
  
								029.php

Este programa es software libre; usted lo puede distribuir o modificar bajo los términos de la version 2 
de GNU - General Public License, tal como es publicada por Free Software Foundation

Este programa se distribuye con la esperanza de que sea útil pero SIN NINGUNA GARANTÍA; 
sin garantía implícita de COMERCIALIZACIÓN o de USO PARA UN PROPÓSITO EN PARTICULAR.

Por favor lea GNU General Public License para más detalles.

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
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/tecnologias_final/header_tecnologias.php');	


if(!isset($_POST["029"])){
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/tecnologias_final/029html.php');	

}else
	{
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/tecnologias_final/029action.php');	
		}



include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/tecnologias_final/footer_tecnologias.php');
?>