<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$tecnologia = $_POST['tecnologia'];
	$codigo_tecnologia = $_POST['id_tecnologia'];
	$this->cadena_select_1="SELECT * FROM tecnologia WHERE tecnologia='".$tecnologia."'";
	$this->cadena_select_2="SELECT * FROM tecnologia WHERE id_tecnologia='".$codigo_tecnologia."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Tecnolog&iacute;a ".$tecnologia." ya existe. Ingrese otro nombre de Tecnolog&iacute;a. "; ?><a href="016.php">Volver</a><br><br><? // tecnologia ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Tecnolog&iacute;a ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="016.php">Volver</a><br><br><? // tecnologia ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO tecnologia (id_tecnologia, tecnologia) 
			VALUES ('".$_POST['id_tecnologia']."', '".$_POST['tecnologia']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Tecnolog&iacute;a ".$_POST['tecnologia']."<br><br>";
			unset($_POST["016"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>