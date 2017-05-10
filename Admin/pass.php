<? 
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/cabecera.php');	
$this->acceso_db=new db_admin;
$this->enlace=$this->acceso_db->conectar_db();
$pass=md5(Gabc7Gu5);
$this->cadena_insert="INSERT INTO administrador (login, password) values ('telemedicina', '".$pass."')";
echo $this->cadena_insert;
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);

?>