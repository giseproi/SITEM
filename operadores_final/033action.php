<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_servicio_operador = $_POST['id_servicio_operador'];
	$codigo_tarifa = $_POST['id_tarifa'];
	$this->cadena_select_2="SELECT * FROM tarifa_operador WHERE id_servicio_operador='".$codigo_servicio_operador."' 
	and id_tarifa='".$codigo_tarifa."'";
		$this->acceso_db->registro_db($this->cadena_select_2,0);
		$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> El c&oacute;digo de la tarifa para este servicio ya existe. Ingrese nuevamente los datos.</font></div>";  // nombre_servicio_telecom ya existe
			include_once("033html.php");
		} 
	else
		{
			$this->cadena_insert="INSERT INTO tarifa_operador ( id_servicio_operador, id_tarifa, estrato, precio_conexion,
			cargo_mensual, otros_valores) 
			VALUES ('".$_POST['id_servicio_operador']."', '".$_POST['id_tarifa']."', '".$_POST['estrato']."', '".$_POST['precio_conexion']."',
			'".$_POST['cargo_mensual']."', '".$_POST['otros_valores']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado las tarifas del Servicio. ";?>
			<link href="estilo/style.css" rel="stylesheet" type="text/css">
			<br><br><strong><a href='025.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 No m&aacute;s tarifas.</a> &nbsp;&nbsp; 
			 &nbsp;&nbsp; <a href='033.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
Tarifas para otro servicio. </a></strong><br><br>
			<? echo "</font></div>";
			unset($_POST["033"]);
			include_once("033html.php");}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
?>