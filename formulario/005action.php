<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_localidad = $_POST['nombre_localidad'];
	$codigo_localidad = $_POST['id_localidad'];
	$this->cadena_select_1="SELECT * FROM localidad WHERE nombre_localidad='".$nombre_localidad."'";
	$this->cadena_select_2="SELECT * FROM localidad WHERE id_localidad='".$codigo_localidad."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Localidad ".$nombre_localidad." ya existe. Ingrese otro nombre de localidad. "; ?><a href="005.php">Volver</a><br><br><? // localidad ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Localidad ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="005.php">Volver</a><br><br><? // localidad ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO localidad (id_localidad, nombre_localidad) 
			VALUES ('".$_POST['id_localidad']."', '".$_POST['nombre_localidad']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Localidad ".$_POST['nombre_localidad']."<br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>