<?

	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$institucion = $_POST['nombre_institucion'];
	$codigo_institucion = $_POST['id_institucion'];
	$this->cadena_select_1="SELECT * FROM institucion WHERE nombre_institucion='".$institucion."'";
	$this->cadena_select_2="SELECT * FROM institucion WHERE id_institucion='".$codigo_institucion."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br><br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> Los datos de la institucion ".$institucion." ya existen. "; ?>
 &nbsp; <strong><a href='006.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese otra Institucion </a><br><br> O
 <br><br><a href='009.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese los datos de las Sedes de la Institucion </a><br><br> O
 <br><br><a href='012.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese los datos de los Servicios. </a><? echo "</font></div>"; ?>
<br><br><br><br></strong>
  <br>
  <? // nombre_institucion ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
				{ 
					echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
					<br> El c&oacute;digo de la Instituci&oacute;n ya existe. Actualice la p&aacute;gina e  "; ?>
<strong>
<a href='006.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
ingrese nuevamente los datos.</a> <? echo "</font></div>"; ?> </strong><br>
  <br>
  <? // nombre_institucion ya existe
					} 
					else
					{
	$this->cadena_insert="INSERT INTO institucion (id_institucion, nombre_institucion, foto_institucion, nombre_director,
	apellido_director, direccion_institucion, id_pais, id_departamento, id_ciudad, id_localidad, telefono_institucion,
	pagina_web,	correo_institucion, id_clase_institucion, nivel, nit) 
	VALUES ('".$_POST['id_institucion']."', '".$_POST['nombre_institucion']."', '".$_POST['foto_institucion']."',
	 '".$_POST['nombre_director']."', '".$_POST['apellido_director']."','".$_POST['direccion_institucion']."', '".$_POST['id_pais']."',
	 '".$_POST['id_departamento']."', '".$_POST['id_ciudad']."', '".$_POST['id_localidad']."',
	 '".$_POST['telefono_institucion']."', '".$_POST['pagina_web']."', '".$_POST['correo_institucion']."',
	 '".$_POST['id_clase_institucion']."', '".$_POST['nivel']."', '".$_POST['nit']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado los datos de la Instituci&oacute;n <br> <strong>".$_POST['nombre_institucion']."</strong>.<br><br><br></p>";
			unset($_POST["006"]);}
			else
			{echo "<br><br><br><br><br>
				<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				<br>_______________________________________________";
			}
			echo "<br><br><br><br><br><br><br><br>";
	}
	}			
?>