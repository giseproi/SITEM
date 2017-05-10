<?	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_medico = $_POST['id_usuario'];
	$numero_id = $_POST['numero_id'];
	$login = $_POST['login'];
    $_POST['password'] = md5($_POST['password']);
	$_POST['conf_password'] = md5($_POST['conf_password']);
   	$this->cadena_select_1="SELECT * FROM medico WHERE numero_id='".$numero_id."' and login='".$login."'";
   	$this->cadena_select_3="SELECT * FROM usuario WHERE numero_id='".$numero_id."' and login='".$login."'";
	$this->acceso_db->registro_db($this->cadena_select_3,0);
	$conteo_2=$this->acceso_db->obtener_conteo_db();
	$this->cadena_select_2="SELECT * FROM medico WHERE id_usuario='".$codigo_medico."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
	if ($conteo>0 or $conteo_2>0)
		{ 
			echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> Ya existe un Nombre de Usuario <strong>".$login.".</strong>"; ?>
 &nbsp; <strong><a href='030.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Cambie el Nombre de Usuario </a><br></strong>
  <br>
  <? // nombre_usuario ya existe
} 
	else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
				{ 
					echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
					<br> El c&oacute;digo del usuario ya existe. Actualice la p&aacute;gina e  "; ?>
<strong>
<a href='030.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
ingrese nuevamente los datos.</a> <? echo "</font></div>"; ?> </strong><br>
  <br>
  <? // nombre_usuario ya existe
					} 
					else
					{
		$this->cadena_insert="INSERT INTO medico (id_usuario, nombre_medico, apellido_medico, numero_id, genero,
		 foto_medico, dia, mes, anno, id_pais, id_departamento, id_ciudad, id_institucion, cargo, especialidad,
		 direccion_contacto_medico, telefono_medico, correo_medico, login, password, conf_password,
		 tipo_acceso, nivel) 
VALUES ('".$_POST['id_usuario']."', '".$_POST['nombre_medico']."', '".$_POST['apellido_medico']."', '".$_POST['numero_id']."', '".$_POST['genero']."', 
		 '".$_POST['foto_medico']."', '".$_POST['dia']."', '".$_POST['mes']."', '".$_POST['anno']."','".$_POST['id_pais']."', '".$_POST['id_departamento']."',
		 '".$_POST['id_ciudad']."', '".$_POST['id_institucion']."', '".$_POST['cargo']."', '".$_POST['especialidad']."',
		 '".$_POST['direccion_contacto_medico']."', '".$_POST['telefono_medico']."', '".$_POST['correo_medico']."',
		 '".$_POST['login']."', '".$_POST['password']."', '".$_POST['conf_password']."', '".$_POST['tipo_acceso']."', '')";
		$this->acceso_db->especificar_enlace($this->enlace);
		$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
		echo "<br><br><br><br><br><br><br>";
		if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado los datos del medico <strong>".$_POST['nombre_medico']." ".$_POST['apellido_medico']." </strong><br><br>
			Pronto le enviaremos un correo a <strong>".$_POST['correo_medico']."</strong> <br><br>para hacerle conocer el <strong> Nivel de acceso </strong> asignado.<br><br></p>";}
			else
			{echo "<br><br><br><br><br><br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br><br><br><br><br><br>_______________________________________________";
			}
			echo "<br><br><br><br><br><br><br><br>";			
	}}
?>