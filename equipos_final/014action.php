<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_equipo = $_POST['id_equipo_medico'];
	$codigo_institucion = $_POST['id_institucion'];
	$codigo_sede = $_POST['id_sede'];
	$codigo_dependencia = $_POST['id_dependencia'];
	$this->cadena_select_1="SELECT * FROM ubicacion_equipo WHERE id_equipo_medico='".$codigo_equipo."'
	and id_institucion='".$codigo_institucion."' and id_sede='".$codigo_sede."' and id_dependencia= ".$codigo_dependencia."";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El Equipo ya se encuentra referenciado con esta Instituci&oacute;n, sede y dependencia. Ingrese otro nombre de Equipo. "; ?><a href="014.php">Volver</a><br><br><? // servicio ya existe
		} 
		else
		{
			$this->cadena_insert="INSERT INTO ubicacion_equipo (id_equipo_medico, id_servicio_medico, id_institucion,
			id_sede, id_dependencia) 
			VALUES ('".$_POST['id_equipo_medico']."', '".$_POST['id_servicio_medico']."', '".$_POST['id_institucion']."',
			'".$_POST['id_sede']."', '".$_POST['id_dependencia']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se han ingresado los datos correctamente. <br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}	
?>