<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_cable = $_POST['nombre_cable'];
	$codigo_clase_cable = $_POST['id_cable'];
	$this->cadena_select_1="SELECT * FROM clase_cable WHERE nombre_cable='".$nombre_cable."'";
	$this->cadena_select_2="SELECT * FROM clase_cable WHERE id_cable='".$codigo_clase_cable."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre del Cable o Conexi&oacute;n de Red ".$nombre_cable." ya existe. Ingrese otro Nombre. "; ?><a href="022.php">Volver</a><br><br><? // nombre_cable ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo del Cable o Conexi&oacute;n de Red ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="022.php">Volver</a><br><br><? // nombre_cable ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO clase_cable (id_cable, nombre_cable) 
			VALUES ('".$_POST['id_cable']."', '".$_POST['nombre_cable']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre del Cable o Conexión de Red ".$_POST['nombre_cable']."<br><br>";
			unset($_POST["022"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>