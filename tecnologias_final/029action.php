<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$medio_transmision = $_POST['nombre_medio_transmision'];
	$codigo_medio_transmision = $_POST['id_medio_transmision'];
	$this->cadena_select_1="SELECT * FROM medio_transmision WHERE nombre_medio_transmision='".$medio_transmision."'";
	$this->cadena_select_2="SELECT * FROM medio_transmision WHERE id_medio_transmision='".$codigo_medio_transmision."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> El nombre del Medio de Transmisi&oacute;n o Conexi&oacute;n de Red ".$medio_transmision." ya existe.
			 Ingrese otro Nombre. "; echo "</font></div><br>"; // nombre_medio_transmision ya existe
			 include_once("029html.php");
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
						<br><br> El c&oacute;digo del Medio de Transmisi&oacute;n o Conexi&oacute;n de Red ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos.  </font></div>";
					include_once("029html.php");
					} 
					else
					{

			$this->cadena_insert="INSERT INTO medio_transmision (id_medio_transmision, nombre_medio_transmision, detalle_medio_transmision) 
			VALUES ('".$_POST['id_medio_transmision']."', '".$_POST['nombre_medio_transmision']."', '".$_POST['detalle_medio_transmision']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br><br><br><br><br><br><br><br><br><br> Se ha ingresado el nombre del Medio de Transmisi&oacute;n o Conexi&oacute;n de Red <br><br>
			<strong>".$_POST['nombre_medio_transmision']."</strong>
			</font></div><br><br><br><br><br><br><br><br><br>";
			unset($_POST["029"]);}
			else
			{echo "<br><br><br><br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>