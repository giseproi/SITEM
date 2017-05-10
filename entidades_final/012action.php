<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_institucion = $_POST['id_institucion'];
	$codigo_sede = $_POST['id_sede'];
	$codigo_servicio = $_POST['id_servicio_medico'];
	$this->cadena_select_1="SELECT * FROM servicio_sede WHERE id_institucion='".$codigo_institucion."'
	and id_sede='".$codigo_sede."' and id_servicio_medico='".$codigo_servicio."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br><br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> Este Servicio para esta instituci&oacute;n y sede ya existe.<br><br><br>"; ?>
 &nbsp; <strong><a href='012.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese otro Servicio o seleccione otra Sede </a><? echo "</font></div>"; ?></strong><br><br><br><br><br><br> <? // servicio ya existe
		} 
		else
		{
			$this->cadena_insert="INSERT INTO servicio_sede (id_institucion, id_sede, id_servicio_medico) 
			VALUES ('".$_POST['id_institucion']."', '".$_POST['id_sede']."', '".$_POST['id_servicio_medico']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br><br> Se han ingresado los datos correctamente.</strong>.<br><br><br></p>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}	
?>