<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_operador=$_POST['id_operador'];
	$servicio_operador = $_POST['nombre_servicio_operador'];
	$codigo_servicio_operador = $_POST['id_servicio_operador'];
	$this->cadena_select_1="SELECT * FROM servicio_operador WHERE nombre_servicio_operador='".$servicio_operador."'
	and id_operador='".$codigo_operador."'" ;
	$this->cadena_select_2="SELECT * FROM servicio_operador WHERE id_servicio_operador='".$codigo_servicio_operador."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Los datos del Servicio ".$servicio_operador." ya existen.
			 Ingrese otro Servicio"; echo "</font></div><br>"; // nombre_servicio_telecom ya existe
			 include_once("025html.php");
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
						<br><br> El c&oacute;digo del Servicio ya existe. Ingrese nuevamente los datos. </font></div>";  // nombre_servicio_telecom ya existe
					include_once("025html.php");
					} 
					else
					{

			$this->cadena_insert="INSERT INTO servicio_operador ( id_servicio_telecom, id_servicio_operador, nombre_servicio_operador, id_operador, 
			 disponibilidad, cobertura, requisito_servicio, ventaja_servicio, id_medio_transmision, ancho_banda, velocidad_transmision) 
			VALUES ('".$_POST['id_servicio_telecom']."','".$_POST['id_servicio_operador']."', '".$_POST['nombre_servicio_operador']."', '".$_POST['id_operador']."',
			 '".$_POST['disponibilidad']."', '".$_POST['cobertura']."', '".$_POST['requisito_servicio']."', '".$_POST['ventaja_servicio']."',
			 '".$_POST['id_medio_transmision']."', '".$_POST['ancho_banda']."', '".$_POST['velocidad_transmision']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se ha ingresado el nombre del Servicio ".$_POST['nombre_servicio_operador'];?>
			<link href="estilo/style.css" rel="stylesheet" type="text/css">
			<br><br><strong><a href='024.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 &nbsp;&nbsp; No más servicios </a></strong>
			<? echo "</font></div>";
			unset($_POST["025"]);
			include_once("025html.php");}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>