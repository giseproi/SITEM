<?

/*********************************************************************************************************************
  
								Formulario.php 

Sistema De Información en Telemedicina
Universidad Distrital
Francisco José de Caldas
Copyright (C) 2010-2016 


Este programa es software libre; usted lo puede distribuir o modificar bajo los términos de la version 2 
de GNU - General Public License, tal como es publicada por la Free Software Foundation

Este programa se distribuye con la esperanza de que sea útil pero SIN NINGUNA GARANTÍA; 
sin garantía implícita de COMERCIALIZACIÓN  o de USO PARA UN PROPÒSITO EN PARTICULAR.

Por favor lea GNU General Public License para más detalles.

************************************************************************************************************************
* @subpackage   
* @package	db
* @copyright     GPL
* @version      	1.0
* @author      	Sistema de Información en Telemedicina - Universidad Distrital
* @link		http://sitem.udistrital.edu.co
* formulario Class 
*
* Esta clase se utiliza para manejar la estructuración de formularios en el sitio web.
* 
* 
*
*/

/**********************************************************************************************************************
*Atributos
*
*@access private
*@param  $servidor
***********************************************************************************************************************
*/

/**********************************************************************************************************************
*Métodos
*
*@access public
*
*@method 
*		 Constructor. Define los valores por defecto 
***********************************************************************************************************************
*/

class formulario{
	/*** Atributos: ***/
	/**
	 * 
	 * @access private
	 */
	var $matrix;
	var $control_formulario;
	var $propiedades;
	/*** Fin de sección Atributos: ***/

	/**
	 *@method descomponer_matrix
	 * @param string $matrix,$id_control_formulario
	 * @return void
	 * @access public
	 */

	function descomponer_matrix( $matrix,$id_control_formulario )
	{
		//Verifica que el número de argumentos pasados sea correcto.
		if(func_num_args()!=2)
		{
			
			return FALSE;
			
			}
			
			$this->matrix = $matrix;
			$this->control_formulario=$id_control_formulario;
		//Determina el número de codificación
		if(strlen($this->control_formulario)==1)
		{
			$this->control_formulario='00'.$this->control_formulario;
			
			}else{
				if(strlen($this->control_formulario)==2)
				{
					$this->control_formulario='0'.$this->control_formulario;
				}
			}
		
		/*Busca dentro de la matriz la ocurrencia de las posibles propiedades de un control; 
		 se realiza por código para evitarnos algunos accesos a la db; estas líneas se generan
		con la p&aacute;gina enumerar_propiedades.php de la carpeta ejemplos
		*/
				
			$this->las_propiedades[0]="nombre";
			$this->las_propiedades[1]="valor";
			$this->las_propiedades[2]="etiqueta";
			$this->las_propiedades[3]="tamanno";
			$this->las_propiedades[4]="max_tamanno";
			$this->las_propiedades[5]="lectura";
			$this->las_propiedades[6]="habilitado";
			$this->las_propiedades[7]="posicion";
			$this->las_propiedades[8]="tipo_aceptado";
			$this->las_propiedades[9]="seleccionado";
			$this->las_propiedades[10]="grupo";
			$this->las_propiedades[11]="ancho_tabla";
			$this->las_propiedades[12]="ancho_unidad";
			$this->las_propiedades[13]="objetivo";
			$this->las_propiedades[14]="encriptacion";
			$this->las_propiedades[15]="accion";
			$this->las_propiedades[16]="metodo";
			$this->las_propiedades[17]="espacio_celdas";
			$this->las_propiedades[18]="espacio_texto";
			$this->las_propiedades[19]="borde_tabla";
			$this->las_propiedades[20]="alineacion_tabla";
			$this->las_propiedades[21]="campo_asociado";
	
	for($contador=0;$contador<count($this->las_propiedades);$contador++)
	{
		if(array_key_exists($this->control_formulario.$this->las_propiedades[$contador],$this->matrix))
		{
			
			$this->propiedades[$this->las_propiedades[$contador]]=$this->matrix[$this->control_formulario.$this->las_propiedades[$contador]];
			
			}
    	}
	
	return $this->propiedades;
				
	} // Fin del método descomponer_matrix

	/**
	 *@method armar_formulario
	 * @param string nombre_db 
	 * @return void
	 * @access public
	 */

	function armar_formulario( $cadena_html)
	{
//To Do: I think that is not necessary to be implement at this time. Maybe in other release [sitem]

}



}//Fin de la clase db_admin

?>
