<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_tipo_red = $_POST['nombre_tipo_red'];
	$codigo_tipo_red = $_POST['id_tipo_red'];
	$this->cadena_select_1="SELECT * FROM tipo_red WHERE nombre_tipo_red='".$nombre_tipo_red."'";
	$this->cadena_select_2="SELECT * FROM tipo_red WHERE id_tipo_red='".$codigo_tipo_red."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre del Tipo de Red".$nombre_tipo_red." ya existe. Ingrese otro nombre de Tipo de Red. "; ?><a href="020.php">Volver</a><br><br><? // nombre_tipo_red ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo del Tipo de Red ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="020.php">Volver</a><br><br><? // nombre_tipo_red ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO tipo_red (id_tipo_red, nombre_tipo_red) 
			VALUES ('".$_POST['id_tipo_red']."', '".$_POST['nombre_tipo_red']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre del Tipo de Red ".$_POST['nombre_tipo_red']."<br><br>";
			unset($_POST["020"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>