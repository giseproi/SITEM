<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_red = $_POST['id_red'];
	$this->cadena_select_2="SELECT * FROM red WHERE id_red='".$codigo_red."'";
	$this->acceso_db->registro_db($this->cadena_select_2,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
	if ($conteo>0)
		{ 
			echo "<br><br> El c&oacute;digo de la Red ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="018.php">Volver</a><br><br><? // nombre_red ya existe
			} 
			else
			{
			$this->cadena_insert="INSERT INTO red (id_red, id_topologia, id_medio_transmision, id_protocolo) 
			VALUES ('".$_POST['id_red']."', '".$_POST['id_topologia']."', '".$_POST['id_medio_transmision']."', '".$_POST['id_protocolo']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se han ingresado los datos de la Red correctamente.<br><br>";
			unset($_POST["018"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
?>