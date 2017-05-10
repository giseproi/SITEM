<?

/**
Primero se verifica si todos los campos obligatorios del formulario son pasados por el metodo POST;
En el caso de que esto falle se termina el procesamiento de la página y se envia un mensaje de 
intento de acceso ilegal al sistema
*/

/*
El formulario devuelve una cadena en blanco '' vacio si no se llenó nada en el control de tipo texto.



*/
if(!key_exists('usuario',$_POST)||!key_exists('clave',$_POST))
{
			//Todo Hacer una página de error específica para ingresos ilegales
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/registrese_final/header_registrese.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/error_ilegal.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/registrese_final/footer_registrese.php');
			exit();
	
	}
		
if(!is_string($_POST['usuario'])||!is_string($_POST['clave']))
		{
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/registrese_final/header_registrese.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/error_datos.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/registrese_final/footer_registrese.php');
			}
	
/**
Segundo: Se comprueba que el usuario y la clave existan en la base de datos

**/

$this->acceso_db=new db_admin;
$this->enlace=$this->acceso_db->conectar_db();
if (is_resource($this->enlace)){
		$this->cadena_sql='SELECT * FROM usuario WHERE login="'.$_POST['usuario'].'" AND password="'.md5($_POST['clave']).'"';
		$this->acceso_db->registro_db($this->cadena_sql,0);
		$this->registro=$this->acceso_db->obtener_registro_db();
		$this->campos=count($this->registro);
		if($this->campos==0){

			$this->cadena_sql='SELECT * FROM medico WHERE login="'.$_POST['usuario'].'" AND password="'.md5($_POST['clave']).'"';
			$this->acceso_db->registro_db($this->cadena_sql,0);
			$this->registro=$this->acceso_db->obtener_registro_db();
			$this->campos=count($this->registro);
			if($this->campos==0)
			{
				?>
				<table border="0" align="center" cellpadding="2" cellspacing="2" style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;">
				  <tbody>
				<tr style="font-family: helvetica,arial,sans-serif;">
					  <td valign="top" style="vertical-align: top;">
				<div align="center"> <font color="#990000" size="2" face="Arial, Helvetica, sans-serif"><br>
						  El Nombre de Usuario o la Contrase&ntilde;a son err&oacute;neos.<br>
						  Reintente el ingreso al sistema.<br>
						  </font> </div></font></font>
					  <p>&nbsp;</p></td>
				</tr>
				</table>
									  </font>
				<div align="left"><font color="#000066" size="4" face="Arial, Helvetica, sans-serif">S</font><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">i 
				  a&uacute;n no dispone de un Nombre de Usuario, Reg&iacute;strese llenando el 
				  siguiente formulario.</font></p> </div> </div>
				<p align="right"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">
									  <link href="http://gemini.udistrital.edu.co/comunidad/grupos/sitem/incluir/style.css" rel="stylesheet" type="text/css">
									<strong><a href='001.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
									Reg&iacute;strese >></a></strong></font></p>
					<?				
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/000html.php');	
			
			}else
			{
			
			    $this->nivel_usuario=$this->registro[0][18];
				$this->id_usuario=$this->registro[0][0];
				//Busca una sesion
				$nueva_sesion=new sesiones;
				$nueva_sesion->especificar_enlace($this->enlace);
				$nueva_sesion->especificar_expiracion(1800);
				$esta_sesion=$nueva_sesion->sesion();
				
				//Si no existe crea una nueva
				if(!$esta_sesion){
					$nueva_sesion->crear_sesion($this->id_usuario,$this->nivel_usuario);
					
				}
				
				//Cuarto: Se recupera el nombre del usuario que accede al sistema guardándolo en una variable de sesion.
				$resultado = $nueva_sesion->guardar_valor_sesion("usuario_sitem",$this->registro[0][1]);
					?>
				<table border="0" align="center" cellpadding="2" cellspacing="2" style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;">
				  <tbody>
				<tr style="font-family: helvetica,arial,sans-serif;">
					  <td style="vertical-align: top;"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Bienvenido 
						<? echo $this->registro[0][1];?></span>
						</font> <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
						<br>
						A partir de este momento est&aacute; registrado en el Sistema de Informaci&oacute;n 
						en Telemedicina.<br>
						Cualquier duda o comentario por favor comun&iacute;quelo a:<br>
						sitem@udistrital.edu.co</font></td>
				</tr>
				</table>
				<?
			}
		

		
		}else
		{
			$this->nivel_usuario=$this->registro[0][18];
				$this->id_usuario=$this->registro[0][0];
				//Busca una sesion
				$nueva_sesion=new sesiones;
				$nueva_sesion->especificar_enlace($this->enlace);
				$nueva_sesion->especificar_expiracion(1800);
				$esta_sesion=$nueva_sesion->sesion();
				
				//Si no existe crea una nueva
				if(!$esta_sesion){
					$nueva_sesion->crear_sesion($this->id_usuario,$this->nivel_usuario);
					
				}
				
				//Cuarto: Se recupera el nombre del usuario que accede al sistema guardándolo en una variable de sesion.
				$resultado = $nueva_sesion->guardar_valor_sesion("usuario_sitem",$this->registro[0][1]);
					?>
				<table border="0" align="center" cellpadding="2" cellspacing="2" style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;">
				  <tbody>
				<tr style="font-family: helvetica,arial,sans-serif;">
					  <td style="vertical-align: top;"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Bienvenido 
						<? echo $this->registro[0][1];?></span>
						</font> <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
						<br>
						A partir de este momento est&aacute; registrado en el Sistema de Informaci&oacute;n 
						en Telemedicina.<br>
						Cualquier duda o comentario por favor comun&iacute;quelo a:<br>
						sitem@udistrital.edu.co</font></td>
				</tr>
				</table>
					<?				
				
		}//Fin del if sçde selección
		
		
		
	} else{
		include_once($_SERVER['DOCUMENT_ROOT'].'/formularios_sitem/incluir/header_registrese.php');	
		//TODO elaborar una página de error específica para acceso erroneo a DB
		include_once($_SERVER['DOCUMENT_ROOT'].'/formularios_sitem/incluir/error.php');	
		include_once($_SERVER['DOCUMENT_ROOT'].'/formularios_sitem/incluir/footer.php');
		exit();
		}
		


	
?>