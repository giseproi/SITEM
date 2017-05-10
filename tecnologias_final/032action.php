<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$tecnologia_conexion = $_POST['nombre_tecnologia_conexion'];
	$codigo_tecnologia_conexion = $_POST['id_tecnologia_conexion'];
	$this->cadena_select_1="SELECT * FROM tecnologia_conexion WHERE nombre_tecnologia_conexion='".$tecnologia_conexion."'";
	$this->cadena_select_2="SELECT * FROM tecnologia_conexion WHERE id_tecnologia_conexion='".$codigo_tecnologia_conexion."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> El nombre de la Tecnolog&iacute;a de Interconexi&oacute;n ".$tecnologia_conexion." ya existe.
			 Ingrese otro Nombre. "; echo "</font></div><br>"; // nombre_servicio_telecom ya existe
			 include_once("032html.php");// nombre_tecnologia_conexion ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
						<br><br> El c&oacute;digo de la Tecnolog&iacute;a de Interconexi&oacute;n ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. </font></div>"; // nombre_tecnologia_conexion ya existe
					include_once("032html.php");
					} 
					else
					{

			$this->cadena_insert="INSERT INTO tecnologia_conexion (id_tecnologia_conexion, nombre_tecnologia_conexion, descripcion_tecnologia,
			 velocidad_transmision, metodo_senalizacion, id_medio_transmision, longitud_maxima, id_topologia, id_protocolo) 
			VALUES ('".$_POST['id_tecnologia_conexion']."', '".$_POST['nombre_tecnologia_conexion']."', '".$_POST['descripcion_tecnologia']."',
			 '".$_POST['velocidad_transmision']."', '".$_POST['metodo_senalizacion']."', '".$_POST['id_medio_transmision']."',
			 '".$_POST['longitud_maxima']."', '".$_POST['id_topologia']."', '".$_POST['id_protocolo']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br><br><br><br><br><br><br><br><br><br> Se ha ingresado el nombre de la Tecnolog&iacute;a de Interconexi&oacute;n <br><br>
			<strong>".$_POST['nombre_tecnologia_conexion']."</strong>
			</font></div><br><br><br><br><br><br><br><br><br>";
			unset($_POST["032"]);}
			else
			{echo "<br><br><br><br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>