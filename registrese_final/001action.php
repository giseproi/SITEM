<?	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$codigo_usuario = $_POST['id_usuario'];
	$numero_id = $_POST['numero_id'];
	$login = $_POST['login'];
    $_POST['password'] = md5($_POST['password']);
	$_POST['conf_password'] = md5($_POST['conf_password']);
   	$this->cadena_select_1="SELECT * FROM usuario WHERE numero_id='".$numero_id."' and login='".$login."'";
   	$this->cadena_select_3="SELECT * FROM medico WHERE numero_id='".$numero_id."' and login='".$login."'";
	$this->acceso_db->registro_db($this->cadena_select_3,0);
	$conteo_2=$this->acceso_db->obtener_conteo_db();
	$this->cadena_select_2="SELECT * FROM usuario WHERE id_usuario='".$codigo_usuario."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0 or $conteo_2>0)
		{ 
			echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> Ya existe un Nombre de Usuario <strong>".$login.".</strong>"; ?>
 &nbsp; <strong><a href='001.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
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
<a href='001.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
ingrese nuevamente los datos.</a> <? echo "</font></div>"; ?> </strong><br>
  <br>
  <? // nombre_usuario ya existe
					} 
					else
					{

	$this->cadena_insert="INSERT INTO usuario (id_usuario, nombre_usuario, apellido_usuario, numero_id, genero,
	 id_pais, id_departamento, id_ciudad, id_localidad, id_institucion, cargo, direccion_contacto,
	 telefono_usuario, correo_usuario, login, password, conf_password, tipo_acceso, nivel) 
VALUES ('".$_POST['id_usuario']."', '".$_POST['nombre_usuario']."', '".$_POST['apellido_usuario']."', '".$_POST['numero_id']."',
'".$_POST['genero']."', '".$_POST['id_pais']."', '".$_POST['id_departamento']."', '".$_POST['id_ciudad']."',
'".$_POST['id_localidad']."', '".$_POST['id_institucion']."', '".$_POST['cargo']."', '".$_POST['direccion_contacto']."',
'".$_POST['telefono_usuario']."', '".$_POST['correo_usuario']."', '".$_POST['login']."', '".$_POST['password']."',
'".$_POST['conf_password']."', '".$_POST['tipo_acceso']."', '')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			echo "<br><br><br><br><br><br>";
			if ($insertar)
			{echo "<p align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			Se han ingresado los datos del usuario <strong>".$_POST['nombre_usuario']." ".$_POST['apellido_usuario']." </strong><br><br>
			Pronto le enviaremos un correo a <strong>".$_POST['correo_usuario']."</strong> <br><br>para hacerle conocer el <strong> Nivel de acceso </strong> asignado.
			</font><br><br><br></p>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error."; ?>
 &nbsp; <strong><a href='001.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Vuelva a intentar.</a><br></strong>
			<? echo "<br>_______________________________________________";
			}
			echo "<br><br><br><br><br><br><br><br>";			
		}
		}	

?>