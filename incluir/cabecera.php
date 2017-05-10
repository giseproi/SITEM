<?






include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/db_admin.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/usuario.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/clases/sesion.class.php');



$this->acceso_db=new db_admin;
$this->enlace=$this->acceso_db->conectar_db();
if (is_resource($this->enlace)){
	$this->nueva_sesion=new sesiones;
	$this->nueva_sesion->especificar_enlace($this->enlace);
	$this->nueva_sesion->especificar_expiracion(1800);
	$this->nueva_sesion->especificar_nivel($this->nivel);
	$this->esta_sesion=$this->nueva_sesion->sesion();
	if(!$this->nivel==0){
		
		if(!$esta_sesion){
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/header_sitem.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/error.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/footer_sitem.php');
			exit();
		}
		
	}


}else
{
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/header_sitem.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/error.php');	
			include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/footer_sitem.php');
			exit();
	
	
	}
unset($this->acceso_db);
unset($this->nueva_sesion);

/****
					Fin de verificar sesion y nivel
**/
?>
