<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_servicio = $_POST['nombre_servicio'];
	$codigo_servicio = $_POST['id_servicio'];
	$this->cadena_select_1="SELECT * FROM servicio WHERE nombre_servicio='".$nombre_servicio."'";
	$this->cadena_select_2="SELECT * FROM servicio WHERE id_servicio='".$codigo_servicio."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre del Servicio ".$nombre_servicio." ya existe. Ingrese otro nombre de Servicio. "; ?><a href="011.php">Volver</a><br><br><? // servicio ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo del Servicio ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="011.php">Volver</a><br><br><? // servicio ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO servicio (id_servicio, nombre_servicio, detalle_servicio) 
			VALUES ('".$_POST['id_servicio']."', '".$_POST['nombre_servicio']."', '".$_POST['detalle_servicio']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre del Servicio ".$_POST['nombre_servicio']."<br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>