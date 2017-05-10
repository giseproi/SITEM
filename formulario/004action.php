<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_ciudad = $_POST['nombre_ciudad'];
	$codigo_ciudad = $_POST['id_ciudad'];
	$this->cadena_select_1="SELECT * FROM ciudad WHERE nombre_ciudad='".$nombre_ciudad."'";
	$this->cadena_select_2="SELECT * FROM ciudad WHERE id_ciudad='".$codigo_ciudad."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Ciudad ".$nombre_ciudad." ya existe. Ingrese otro nombre de Ciudad. "; ?><a href="004.php">Volver</a><br><br><? // ciudad ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Ciudad ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="004.php">Volver</a><br><br><? // ciudad ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO ciudad (id_ciudad, nombre_ciudad) 
			VALUES ('".$_POST['id_ciudad']."', '".$_POST['nombre_ciudad']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Ciudad ".$_POST['nombre_ciudad']."<br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>