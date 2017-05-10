<?
/*********************************************************************************************************************
GITEM
Grupo de Investigación en Telemedicina
Universidad Distrital


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

* sesiones Class 
*
* Esta clase de utiliza para manejar las sesiones en el sistema.
* 
* 
*
*/
/**********************************************************************************************************************
*Atributos
*
*@access private
*@param  $conexion_id
*		Identificador del enlace a la base de datos 
*@param  $sesion_id
*		Identificador de la sesion
*@param  $expiracion
*		Tiempo que dura la sesion en segundos
*@param  $usuario
*		Nombre de usuario
*@param  $nivel
*		Nivel de acceso que tiene el usuario.
*@param  $registro_sesion
*		Registro que almacena el valor de las variables de sesión.		
***********************************************************************************************************************
*/

/**********************************************************************************************************************
*Métodos
*
*@access public
*
*@method sesiones
*		 Constructor. Define los valores por defecto 
*@method sesion
*		 Determina la existencia de una sesión, actualizando su expiración en caso de existir
*@method abrir_sesion
*		 Método auxiliar de sesión que realiza la búsqueda de la sesión.
*@method caracteres_validos
*		 Verifica que los caracteres de la sesión_id sean alfanuméricos
*@method especificar_sesion
*		 Especifica el sesion_id
*@method especificar_enlace
*		 Especifica el enlace a la db que ha de usarse.
*@method especificar_usuario
*		 Define el usuario propietario de la sesión
*@method especificar_nivel
*		 Define el nivel de acceso
*@method especificar_expiracion
*		 Define el tiempo de expiración de las nuevas sesiones que se crean.
*@method usuario_ip
*		 Rescata la dirección IP del usuario, clave para crear sesion_id
*@method crear_sesion
*		 Inserta un registro de sesión en el sistema
*@method rescatar_valor_sesión
*		 Obtiene el valor de una variable de sesión determinada
*@method guardar_valor_sesion
*		 Guarda el valor de una variable de sesión determinada
*@method borrar_sesion_expirada
*		 Remueve de la db las sesiones que esten expiradas
*@method encriptar_identificador
*		 Para futuro uso. Encripta el sesion_id para evitar creaciones de sesión no autorizadas
*@method terminar_sesion
*		 Borra una sesión específica
*
***********************************************************************************************************************
*/

/*
 * @USAGE
* El uso de la clase es bastante simple. Inicia con la creación de un objeto de tipo sesiones:
* 		$nueva_sesion=new sesiones();
* El constructor define por defecto:
* 		$this->usuario='ANONIMOUS'
* 		$this->nivel=0 (Sin ningún privilegio de acceso)
* 		$this->expiracion=1800 (30 minutos)
*Si se quieren sobreescribir estos valores se debe invocar los métodos:
*		$nueva_sesion->especificar_usuario('nuevo_usuario')
*		$nueva_sesion->especificar_nivel(nuevo_nivel) (Donde nuevo_nivel es un entero)
*		$nueva_sesion->especificar_expiracion(tiempo_segundos)
*Luego de estos pasos se verifica la existencia de una sesión válida para la máquina del cliente
*		$nueva_sesion->sesion()
*Este método retorna TRUE en el caso de que exista una sesión válida, al mismo tiempo que
*actualiza el valor de la fecha de creación de la sesión. Si por el contrario no encuentra una sesión
*devuelve FALSE.
*Para crear una nueva sesión se debe llamar al método:
*		$nueva_sesion->crear_sesion
* 
* 
 */











class sesiones extends usuario {





	/** Aggregations: */

	/** Compositions: */

	/*** Attributes: ***/

	/**
	 * Miembros privados de la clase 
	 * @access private
	 */
     	var $conexion_id;
     	var $sesion_id;
     	var $expiracion;
     	var $usuario;
	var $nivel;
	var $registro_sesion;
	


	/**
	 * @method sesiones
	 * constructor
	 */
	function sesiones()
	{
		$this->usuario= 'ANONIMO';
		$this->expiracion=1800;
		$this->nivel=0;
		
	}//Fin del método sesiones

	/**
	 *@method sesion 
	 * @param string nombre_db 
	 * @return void
	 * @access public
	 */    
	function sesion()
    	{
        /** Si se ha pasado un identificador de conexión válido se usa, de otra forma
         se utiliza uno por defecto*/
	
             
	//Se eliminan las sesiones expiradas
	$borrar=$this->borrar_sesion_expirada();
	//echo $borrar.' Debug<br>';

        /* Verifica si existe una sesión o crea una nueva
         	1. Genera el identificador de sesion del usuario
		$_SERVER["HTTP_USER_AGENT"] devuelve el tipo de navegador que esta utilizando el cliente
	 */
         $id_sesion= md5($this->usuario_ip().$_SERVER["HTTP_USER_AGENT"]);
	 $this->especificar_sesion($id_sesion);

         // Trata de localizarla en la db
         $resultado=$this->abrir_sesion($this->sesion_id);
        	

        // Detecta errores
        if ($resultado == FALSE) {
            return FALSE;
        } else {
            	// Si no hubo errores se puede actualizar los valores
            	// Update, porque se tiene un identificador
            	$cadena_sql = "UPDATE sesion SET fecha_sesion=NOW() WHERE id_sesion='".($this->sesion_id)."'";
		$db_sel = new db_admin();
		$db_sel->especificar_enlace($this->conexion_id);
		$resultado=$db_sel->ejecutar_acceso_db($cadena_sql); 
		 return $resultado;               


            }
}//Fin del método sesion

	/**
	 *@METHOD abrir_sesion
	 *
	 * Busca la sesión en la base de datos
	 * @PARAM sesion
	 * @return valor
	 * @access public
	 */

	function abrir_sesion($sesion)
    	{
        	// Primero se verifica la longitud del parámetro
        	
		if (strlen($sesion) != 32) {
            	return FALSE;
        	} else {
            		// Verifica la validez del id de sesion
				
            		if ($this->caracteres_validos($sesion) != strlen($sesion)) {

				return FALSE;
            		}
						
			$this->especificar_sesion($sesion);
            		// Busca una sesión que coincida con el id del computador y el nivel de acceso de la página
			$cadena_sql = "SELECT * FROM sesion WHERE id_sesion = '".($this->sesion_id)."'  AND nivel_acceso=".$this->nivel." AND (fecha_sesion + expiracion) > NOW()  LIMIT 1";
			//$cadena_sql = "SELECT (fecha_sesion + expiracion), NOW() FROM sesion LIMIT 1";
			//echo $cadena_sql;
			$db_sel = new db_admin();
         		$db_sel->especificar_enlace($this->conexion_id);
			$resultado=$db_sel->registro_db($cadena_sql,1); 
			
			//echo $resultado; importante para depurar
			$count = $db_sel->obtener_conteo_db();

			if($count>0){
				
				return TRUE;
			}else{
							
				return FALSE;
				}
		}
	      
    } //Final del método abrir_sesion


	/**
	 *@METHOD caracteres_validos
	 *
	 * Verifica que los caracteres en el identificador de sesión sean válidos
	 * @PARAM cadena
	 * @return valor
	 * @access public
	 */


	 function caracteres_validos($cadena)
    {
        // Retorna el número de elementos que coinciden con la lista de caracteres
        return strspn($cadena, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
    }


	/**
	 *@METHOD especificar_sesion
	 *
	 * Obtiene los valores guardados para una determinada sesión de usuario
	 * @return valor
	 * @access public
	 */

	function especificar_sesion($sesion_id)
	{
	
		$this->sesion_id=$sesion_id;
		
	} // end of member function especificar_sesion


	/**
	 *@METHOD especificar_enlace
	 *
	 * @param conexion_id
	 * @return valor
	 * @access public
	 */

	function especificar_enlace($conexion_id)
	{
		
		if(is_resource($conexion_id)){
			$this->conexion_id=$conexion_id;
		}
		
	} //Fin de la función especificar_enlace


	/**
	 *@METHOD especificar_expiracion
	 * @return valor
	 * @access public
	 */

	function especificar_expiracion($expiracion)
	{
		
		$this->expiracion=$expiracion;
		
	} //Fin del mètodo especificar_expiracion


/**
	 *@METHOD especificar_nivel
	 *
	 * @param nivel
	 * @access public
	 */

	function especificar_nivel($nivel)
	{
		$this->nivel=$nivel;
				
	} //Fin de la función especificar_enlace


/**
	 *@METHOD especificar_usuario
	 * @return valor
	 * @access public
	 */

	function especificar_usuario($usuario)
	{
		
		$this->usuario=$usuario;
		
	} //Fin del mètodo especificar_usuario

	/**
	 *@METHOD usuario_ip
	 * @return valor
	 * @access public
	 */


	function usuario_ip()
    	{

        	// Listado de posibles fuentes para la dirección IP, en orden de prioridad
        	$fuentes_ip = array(
            	"HTTP_X_FORWARDED_FOR",
            	"HTTP_X_FORWARDED",
            	"HTTP_FORWARDED_FOR",
            	"HTTP_FORWARDED",
            	"HTTP_X_COMING_FROM",
            	"HTTP_COMING_FROM",
            	"REMOTE_ADDR",
        	);

        	foreach ($fuentes_ip as $fuentes_ip) {
            		// Si la fuente existe captura la IP
            		if (isset($_SERVER[$fuentes_ip])) {
            		    	$proxy_ip = $_SERVER[$fuentes_ip];
            		    	break;
            		}
        	}

        	$proxy_ip = (isset($proxy_ip)) ? $proxy_ip : @getenv("REMOTE_ADDR");
        	// Regresa la IP
        	return $proxy_ip;
    	}//Fin del método usuario_ip	



	/**
	 *@METHOD crear_sesion
	 *
	 * Crea una nueva sesión en la base de datos.
	 * @PARAM usuario_sitem
	 * @PARAM nivel_acceso
	 * @PARAM expiracion
	 * @PARAM conexion_id
	 * @return boolean
	 * @access public
	 */

	function crear_sesion($usuario_sitem,$nivel_acceso)
    	{
       

		if($usuario_sitem){
			$this->usuario=$usuario_sitem;
		}else{
			$this->usuario='0';
		}
		if($nivel_acceso){
			$this->nivel=$nivel_acceso;
		}else{
			$this->nivel=0;	
		}
		$this->sesion_id= md5($this->usuario_ip().$_SERVER["HTTP_USER_AGENT"]);
        	
		if (strlen($this->sesion_id) != 32) {
            			return FALSE;
        	} else {
            			// Verifica la validez del id de sesion
            		if ($this->caracteres_validos($this->sesion_id) != strlen($this->sesion_id)) {
                	return FALSE;
            	}
				
            	$cadena_sql = "INSERT INTO sesion ( id_usuario , id_sesion , fecha_sesion , expiracion , nivel_acceso ) VALUES (".$this->usuario.", '".$this->sesion_id."', NOW( ) , ".$this->expiracion.",".$this->nivel.")";
				//echo $cadena_sql.'<br>';
				$db_sel = new db_admin();
				$db_sel->especificar_enlace($this->conexion_id);
				$resultado=$db_sel->ejecutar_acceso_db($cadena_sql); 
				
				return $resultado;
			}
		
	      
        }//Fin del método crear_sesion




	/**
	 *@METHOD rescatar_valor_sesion
	 * @PARAM variable
	 * @PARAM usuario_sitem ??
	 * @return boolean
	 * @access public
	 */


    function rescatar_valor_sesion($variable)
    {

		$this->sesion_id= md5($this->usuario_ip().$_SERVER["HTTP_USER_AGENT"]);
		// Busca la sesión
		$this->cadena_sql = "SELECT * FROM valor_sesion WHERE id_sesion = '".($this->sesion_id)."'  AND variable='".$variable."'";
		//echo $this->cadena_sql;
		$this->db_sel = new db_admin;
		$this->db_sel->especificar_enlace($this->conexion_id);
		$this->resultado=$this->db_sel->registro_db($this->cadena_sql,0); 
		//echo $this->resultado; importante para depurar
		$this->count = $this->db_sel->obtener_conteo_db();

		if($this->count>0){
				$this->registro_sesion=$this->db_sel->obtener_registro_db();
				unset($this->db_sel);
				return $this->registro_sesion;
		}else{
				unset($this->db_sel);							
				return FALSE;
			}


    }//Fin del método rescatar_valor_sesion


	/**
	 *@METHOD guardar_valor_sesion
	 * @PARAM variable
	 * @PARAM valor
	 * @return boolean
	 * @access public
	 */

    function guardar_valor_sesion($variable,$valor)
    {
        $num_args = func_num_args();
        
        if ($num_args == 0) {
    	       return FALSE;
        } else {
        	
		//Si la variable ya existe en la sesión entonces UPDATE	
		$this->sesion_id= md5($this->usuario_ip().$_SERVER["HTTP_USER_AGENT"]);
        	$cadena_sql = "SELECT * FROM valor_sesion WHERE id_sesion = '".($this->sesion_id)."'  AND variable='".$variable."'";
		$db_sel = new db_admin();
		$db_sel->especificar_enlace($this->conexion_id);
		$resultado=$db_sel->registro_db($cadena_sql,1); 
		//echo $resultado; importante para depurar
		$count = $db_sel->obtener_conteo_db();
		
		if($count>0){
		
			$cadena_sql="UPDATE valor_sesion SET valor='".$valor."' WHERE id_sesion='".($this->sesion_id)."'";
			$resultado=$db_sel->ejecutar_acceso_db($cadena_sql); 
			unset($db_sel);
			
			return $resultado;
			
				
		}else{	
				
				$cadena_sql = "INSERT INTO valor_sesion ( id_sesion,variable,valor) VALUES ('".$this->sesion_id."', '".$variable."','".$valor."' )";
				$resultado=$db_sel->ejecutar_acceso_db($cadena_sql); 
				unset($db_sel);
				return $resultado;				
				
			}

		
    	}
    }//Fin del método guardar_valor_sesion

    
	

	/**
	 * @method borrar_sesion_expirada
	 * @return void
	 * @access public
	 */
	  function borrar_sesion_expirada()
    {
        // DELETE
	$cadena_sql = "DELETE FROM sesion WHERE (fecha_sesion + expiracion) < NOW()";
	
	$db_sel = new db_admin();
	$db_sel->especificar_enlace($this->conexion_id);
	if($db_sel->ejecutar_acceso_db($cadena_sql)) {
		return TRUE;
	} else {
		return FALSE;
	}
			
	}//Fin del método borrar_sesion_expirada


	/**
	 *@method encriptar_identificador 
	 * @return void
	 * @access public
	 */
	  
			
	 function encriptar_identificador($identificador)
    {
        // Si el valor no tiene 32 caracteres, la encriptación no trabaja, retornando
        // los valores enviados a la función. 32 caracteres es la encriptacion de md5
		
        if (strlen($identificador) == 32) {
            // Poner al revés la cadena de sesion_id; previene de intentos para capturar sesiones existentes.
                return strrev($identificador);
        } else {
            // sesion_id incorrecta
            return $identificador;
        }
    }//Fin del método encriptar_identificador

	
/**
	 * 
	 *@method terminar_sesion
	 * @return boolean
	 * @access public
	 */
	  
	function terminar_sesion()
    {
        $cadena_sql = "DELETE FROM sesion WHERE id_sesion = '".($this->sesion_id)."' LIMIT 1";
	//echo $cadena_sql;
	$db_sel = new db_admin();
	$db_sel->especificar_enlace($this->conexion_id);//corregir
	$resultado=$db_sel->ejecutar_acceso_db($cadena_sql); 
	unset($db_sel);
	//echo $resultado;
	return $resultado;				
	
        
    }//Fin del método terminar_sesion

	
	
	


}//Fin de la clase sesion
	
	?>
