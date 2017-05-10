<?
/************************************************************************
  			autenticar_usuario.php

Sistema de Información en Telemedicina

Copyright (C) 2010-2016
Universidad Distrital Francisco José de Caldas
Grupo de Investigación en Telemedicina



Este programa es software libre; usted lo puede distribuir 
o modificar bajo los términos de la version 2 de GNU - 
General Public License, tal como es publicada por la
Free Software Foundation

Este programa se distribuye con la esperanza de que sea
útil pero SIN NINGUNA GARANTÍA; sin garantía implícita de
COMERCIALIZACIÓN  o de USO PARA UN PROPÒSITO
EN PARTICULAR.

Por favor lea GNU General Public License para más detalles.

**************************************************************************
* @subpackage   
* @package      usuario
* @copyright     GPL
* @version      1.0
* @author      	Sistema de Información en Telemedicina - Universidad Distrital
* @link		http://sitem.udistrital.edu.co
**/

/**
 * class usuario
 * Esta clase se encarga de administrar los usuarios dentro del SIUAD
 */

class usuario {


	/** Aggregations: */

	/** Compositions: */

	/*** Attributes: ***/

	/**
	 * 
	 * @access private
	 */
	var $usuario_sitem;
	/**
	 * 
	 * @access private
	 */
	var $clave_sitem;
	/**
	 * 
	 * @access private
	 */
	
	/**
	 * 
	 *
	 * @return void
	 * @access public
	 */
	function especificar_usuario($usuario_sitem)
	{
		
		$this->usuario_sitem=$usuario_sitem;
		
	} // end of member function especificar_servidor

/**
	 * 
	 *
	 * @return void
	 * @access public
	 */
	function especificar_clave($clave_sitem)
	{
		$this->clave_sitem=$clave_sitem;
	} // end of member function especificar_servidor


	/**
	 * 
	 *
	 * @param string nombre_db 
	 * @return void
	 * @access public
	 */
	function autenticar($id_conexion=NULL){
		
		        if (is_resource($id_conexion)) {

						$this->cadena_sql='SELECT usuario,clave FROM usuario_sitem WHERE usuario="'.$this->usuario_sitem.'" AND clave="'.$this->clave_sitem.'"';
						$db_sel = new seleccion_db();
						$resultado=$db_sel->registro_db($this->cadena_sql, "1"); 
						//echo $resultado; importante para depurar
						$this->count = $db_sel->obtener_conteo_db();
						$db_sel->desconectar_db();
						/**Si ha encontrado un registro que coincida con los criterios de búsqueda retorna TRUE de otra forma retorna
						FALSE**/
						
						if($this->count>0){
							
							$this->mensaje=true;
							return $this->mensaje;
						}else{
							
							$this->mensaje=false;
							return $this->mensaje;
						}
				}
	 }
	

	/**
	 * initAttributes sets all conexion_db attributes to its default  value
	 * make sure to call this method within your class constructor
	 */
	function atributos_iniciales( )
	{
		$this->usuario_sitem = 'anonimo';
		$this->clave_sitem = 'anonimo';
	}

	}
	
	?>
