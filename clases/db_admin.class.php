<?

/*********************************************************************************************************************
  
								db_admin.php 

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
* db_admin Class 
*
* Esta clase de utiliza para manejar el acceso a las bases de datos.
* 
* 
*
*/

/**********************************************************************************************************************
*Atributos
*
*@access private
*@param  $servidor
*		URL del servidor de bases de datos. 
*@param  $db
*		Nombre de la base de datos
*@param  $usuario
*		Usuario de la base de datos
*@param  $clave
*		Clave de acceso al servidor de bases de datos
*@param  $enlace
*		Identificador del enlace a la base de datos
*@param  $dbms
*		Nombre del DBMS, por defecto se tiene MySQL
*@param  $cadena_sql
*		Clausula SQL a ejecutar
*@param  $err
*		Mensaje de error devuelto por el DBMS
*@param  $numero
*		Número de registros a devolver en una consulta
*@param  $conteo
*		Número de registros que existen en una consulta
*@param  $registro
*		Matriz para almacenar los resultados de una búsqueda
*@param  $campo
*		Número de campos que devuelve una consulta
*TO DO    	Implementar la funcionalidad en DBMS diferentes a MySQL		
***********************************************************************************************************************
*/

/**********************************************************************************************************************
*Métodos
*
*@access public
*
*@method db_admin
*		 Constructor. Define los valores por defecto 
*@method especificar_db
*		 Para especificar a través de código el nombre de la base de datos
*@method especificar_usuario
*		Para especificar a través de código el nombre del usuario de la base de datos
*@method especificar_clave
*		Para especificar a través de código la clave de acceso al servidor de bases de datos
*@method especificar_servidor
*		Para especificar a través de código la URL del servidor de DB
*@method especificar_dbms
*		Para especificar a través de código el nombre del DBMS
*@method especificar_enlace
*		Para especificar el recurso de enlace a la DBMS
*@method conectar_db
*		Conecta a un DBMS
*@method probar_conexion
*		Con la cual se realizan acciones que prueban la validez de la conexión
*@method desconectar_db
*		Libera la conexion al DBMS
*@method ejecutar_acceso_db
*		Ejecuta clausulas SQL de tipo INSERT, UPDATE, DELETE
*@method obtener_error
*		Devuelve el mensaje de error generado por el DBMS
*@method obtener_conteo_dbregistro_db
*		Devuelve el número de registros que tiene una consulta
*@method registro_db
*		Ejecuta clausulas SQL de tipo SELECT
*@method obtener_registro_db
*		Devuelve el resultado de una consulta como una matriz bidimensional
*@method obtener_error
*		Realiza una consulta SQL y la guarda en una matriz bidimensional
*
***********************************************************************************************************************
*/

class db_admin{
	/*** Atributos: ***/
	/**
	 * 
	 * @access private
	 */
	var $servidor;
	var $db;
	var $usuario;
	var $clave;
	var $enlace;
	var $dbms;
	var $cadena_sql;
	var $err;
	var $numero;
	var $conteo;
	var $registro;
	var $campo;


	/*** Fin de sección Atributos: ***/

	/**
	 *@method especificar_db 
	 * @param string nombre_db 
	 * @return void
	 * @access public
	 */

	function especificar_db( $nombre_db )
	{
				$this->db = $db;
	} // Fin del método especificar_db

	/**
	 *@method especificar_usuario 
	 * @param string usuario_db 
	 * @return void
	 * @access public
	 */
	function especificar_usuario( $usuario_db )
	{
				$this->usuario = $usuario_db;
	} // Fin del método especificar_usuario


	/**
	 *@method especificar_clave 
	 * @param string nombre_db 
	 * @return void
	 * @access public
	 */
	function especificar_clave( $clave_db )
	{
				$this->clave = $clave_db;
	} // Fin del método especificar_clave

	/**
	 * 
	 *@method especificar_servidor
	 * @param string servidor_db 
	 * @return void
	 * @access public
	 */
	function especificar_servidor( $servidor_db )
	{
				$this->servidor = $servidor_db;
	} // Fin del método especificar_servidor

	/**
	 * 
	 *@method especificar_dbms
	 *@param string dbms
	 * @return void
	 * @access public
	 */
	
	function especificar_dbms( $dbms )
	{
				$this->dbms = $dbms;
	} // Fin del método especificar_dbms

	/**
	 * 
	 *@method especificar_enlace
	 *@param resource enlace
	 * @return void
	 * @access public
	 */
	
	function especificar_enlace($enlace )
	{
		if(is_resource($enlace)){
				$this->enlace = $enlace;
		}
	} // Fin del método especificar_enlace

	/**
	 * 
	 * @method conectar_db
	 * @return void
	 * @access public
	 */
	function conectar_db()
	{

		
		switch($this->dbms){
			case 'mysql':
					$this->enlace=mysql_connect($this->servidor, $this->usuario, $this->clave);
					if($this->enlace){
						
						$base=mysql_select_db($this->db);	
						if($base){
							
							return $this->enlace;	
							
							}else{
								
								$this->mensaje_error='Imposible conectar a la base de datos';
								return $this->mensaje_error;
								
								}
						
									
						}else{
							
								$this->mensaje_error='Imposible conectar al servidor MySQL';
								return $this->mensaje_error;
							
						}
					
		}
	} // Fin del método conectar_db

	/**
	 * 
	 * @method probar_conexion
	 * @return void
	 * @access public
	 */
	function probar_conexion( )
	{
		/**
		TO DO
		*/
	} // Fin del método probar_conexion

	/**
	 * 
	 * @method desconectar_db
	 * @param resource enlace
	 * @return void
	 * @access public
	 */
	function desconectar_db()
	{
		mysql_close($this->enlace);
		
	} //Fin del método desconectar_db

	
	/**
	* @method ejecutar_acceso_db	 
	* @param string cadena_sql 
	* @param string conexion_id
	* @return boolean
	* @access public
	 */
	
	function ejecutar_acceso_db($cadena_sql) {
	
	if(!mysql_query($cadena_sql,$this->enlace)) {
			$this->err = mysql_error();
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	* @method obtener_error	 
	* @param string cadena_sql 
	* @param string conexion_id
	* @return boolean
	* @access public
	 */
	
	function obtener_error(){
		return $this->err;
	}//Fin del método obtener_error

	/**
	* @method registro_db	 
	* @param string cadena_sql 
	* @param int numero
	* @return boolean
	* @access public
	 */
	function registro_db($cadena_sql,$numero) {
		
		
		if(!is_resource($this->enlace)){
			return FALSE;
		}
		$busqueda=mysql_query($cadena_sql,$this->enlace);
		//echo '<strong>'.$cadena_sql.'</strong><br>';

		//Determinamos el número de campos retornados en la consulta
		
		if($busqueda){
			$this->campo = mysql_num_fields($busqueda);
			$this->conteo = mysql_num_rows($busqueda);
			if($numero==0){
				
					$numero=$this->conteo;
					
				}	
		
		
			 for($j=0; $j<$numero; $j++){
				//echo $j.'<br>';
				$salida = mysql_fetch_array($busqueda);
				for($un_campo=0; $un_campo<$this->campo; $un_campo++){
					
					$this->registro[$j][$un_campo] = $salida[$un_campo];
					//echo 'registro['.$j.']['.$un_campo.'] = '.$salida[$un_campo].'<br>';
				}
			}
		}else{
				
				$this->err = mysql_error();
				return $this->err; 
			
			}
	}// Fin del método registro_db
	
	/**
	* @method obtener_registro_db	 
	* @return registro []
	* @access public
	 */

	function obtener_registro_db() {
		return $this->registro;
	}//Fin del método obtener_registro_db
	
	
	/**
	* @method obtener_conteno_db	 
	* @return int conteo
	* @access public
	 */
	function obtener_conteo_db() {
		return $this->conteo;
	
	}//Fin del método obtener_conteo_db


	/**
	 * @method db_admin
	 *	
	 */
	function db_admin( )
	{
		$this->servidor = 'localhost';
		$this->db = 'sitem';
		$this->usuario = 'telemedicina';
		$this->clave = 'Gabc7Gu5';
		$this->dbms = 'mysql';
	}//Fin del método db_admin

}//Fin de la clase db_admin

?>
