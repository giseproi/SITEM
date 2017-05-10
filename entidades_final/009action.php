<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_sede = $_POST['nombre_sede'];
	$codigo_sede = $_POST['id_sede'];
	$id_institucion=$_POST['id_institucion'];
	$this->cadena_select_1="SELECT * FROM sede WHERE nombre_sede='".$nombre_sede."' and id_institucion='".$id_institucion."'";
	$this->cadena_select_2="SELECT * FROM sede WHERE id_sede='".$codigo_sede."' and id_institucion='".$id_institucion."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br><br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> El nombre de la Sede ".$nombre_sede." ya existe."; ?>
 &nbsp; <strong><a href='009.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese otra Sede </a><br><br> O
 <br><br><a href='012.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese los datos de los Servicios. </a><? echo "</font></div>"; ?>
<br><br><br><br></strong>
<?		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Sede ya existe. Actualice la p&aacute;gina e ";?>
<strong>
<a href='006.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
ingrese nuevamente los datos.</a> <? echo "</font></div>"; ?> </strong><br>
  <br>
<?					} 
					else
					{
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_insert="INSERT INTO sede (id_sede, nombre_sede, id_institucion, id_departamento,
	id_ciudad, id_localidad, direccion_sede, telefono_sede, correo_sede, area, edificios) 
	VALUES ('".$_POST['id_sede']."', '".$_POST['nombre_sede']."', '".$_POST['id_institucion']."',
	 '".$_POST['id_departamento']."', '".$_POST['id_ciudad']."', '".$_POST['id_localidad']."',
	 '".$_POST['direccion_sede']."', '".$_POST['telefono_sede']."', '".$_POST['correo_sede']."',
	 '".$_POST['area']."', '".$_POST['edificios']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			echo "<br><br><br><br><br><br><br>";
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado los datos de la Sede <br> <strong>".$_POST['nombre_sede']."</strong>.<br><br><br>
			Ingrese los datos de los Servicios</p>";
			include_once("012.php");
			unset($_POST["009"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";
			}
			echo "<br><br><br><br><br><br><br><br>";}}		
?>