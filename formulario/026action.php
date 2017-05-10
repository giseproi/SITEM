<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_servicio_telecom = $_POST['nombre_servicio_telecom'];
	$codigo_servicio_telecom = $_POST['id_servicio_telecom'];
	$this->cadena_select_1="SELECT * FROM servicio_telecom WHERE nombre_servicio_telecom='".$nombre_servicio_telecom."'";
	$this->cadena_select_2="SELECT * FROM servicio_telecom WHERE id_servicio_telecom='".$codigo_servicio_telecom."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de Servicio ".$nombre_servicio_telecom." ya existe. Ingrese otro nombre de Departamento/Estado. "; ?><a href="003.php">Volver</a><br><br><? // departamento ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo del Servicio ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="003.php">Volver</a><br><br><? // departamento ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO servicio_telecom (id_servicio_telecom, nombre_servicio_telecom) 
			VALUES ('".$_POST['id_servicio_telecom']."', '".$_POST['nombre_servicio_telecom']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre del Servicio ".$_POST['nombre_servicio_telecom']."<br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>