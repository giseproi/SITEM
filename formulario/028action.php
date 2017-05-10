<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_dependencia = $_POST['nombre_dependencia'];
	$codigo_dependencia = $_POST['id_dependencia'];
	$this->cadena_select_1="SELECT * FROM dependencia WHERE nombre_dependencia='".$nombre_dependencia."'";
	$this->cadena_select_2="SELECT * FROM dependencia WHERE id_dependencia='".$codigo_dependencia."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Dependencia ".$nombre_dependencia." ya existe. Ingrese otro Nombre. "; ?><a href="028.php">Volver</a><br><br><? // nombre_dependencia ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Dependencia ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="028.php">Volver</a><br><br><? // nombre_dependencia ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO dependencia (id_dependencia, nombre_dependencia) 
			VALUES ('".$_POST['id_dependencia']."', '".$_POST['nombre_dependencia']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Dependencia ".$_POST['nombre_dependencia']."<br><br>";
			unset($_POST["028"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>