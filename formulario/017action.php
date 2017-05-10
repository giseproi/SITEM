<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$interfaz = $_POST['interfaz'];
	$codigo_interfaz = $_POST['id_interfaz'];
	$this->cadena_select_1="SELECT * FROM interfaz WHERE interfaz='".$interfaz."'";
	$this->cadena_select_2="SELECT * FROM interfaz WHERE id_interfaz='".$codigo_interfaz."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Interfaz ".$interfaz." ya existe. Ingrese otro nombre de Interfaz. "; ?><a href="017.php">Volver</a><br><br><? // interfaz ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Interfaz ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="017.php">Volver</a><br><br><? // interfaz ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO interfaz (id_interfaz, interfaz) 
			VALUES ('".$_POST['id_interfaz']."', '".$_POST['interfaz']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Interfaz ".$_POST['interfaz']."<br><br>";
			unset($_POST["017"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>