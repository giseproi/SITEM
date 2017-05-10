<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$marca = $_POST['marca'];
	$codigo_marca = $_POST['id_marca'];
	$this->cadena_select_1="SELECT * FROM marca WHERE marca='".$marca."'";
	$this->cadena_select_2="SELECT * FROM marca WHERE id_marca='".$codigo_marca."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Marca ".$marca." ya existe. Ingrese otro nombre de marca. "; ?><a href="015.php">Volver</a><br><br><? // marca ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El codigo de la Marca ya existe. Actualice la página e ingrese nuevamente los datos. "; ?><a href="015.php">Volver</a><br><br><? // marca ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO marca (id_marca, marca) 
			VALUES ('".$_POST['id_marca']."', '".$_POST['marca']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la marca ".$_POST['marca']."<br><br>";
			unset($_POST["015"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>