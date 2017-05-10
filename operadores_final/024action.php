<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$operador = $_POST['nombre_operador'];
	$codigo_operador = $_POST['id_operador'];
	$this->cadena_select_1="SELECT * FROM operador WHERE nombre_operador='".$operador."'";
	$this->cadena_select_2="SELECT * FROM operador WHERE id_operador='".$codigo_operador."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br><br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> Los datos de Operador ".$operador." ya existen. "; ?>
 &nbsp; <strong><a href='024.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese otro Operador </a><br><br> O
 <br><br><a href='025.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese los datos de los Servicios del Operador </a><? echo "</font></div>"; ?>
<br><br><br><br><br><br><br></strong>
  <br>
  <? // nombre_operador ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
				{ 
					echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
					<br> El c&oacute;digo del Operador ya existe. Actualice la p&aacute;gina e  "; ?>
<strong>
<a href='024.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
ingrese nuevamente los datos.</a> <? echo "</font></div>"; ?> </strong><br>
  <br>
  <? // nombre_operador ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO operador (id_operador, nombre_operador, resena_operador,
			 nombre_sede_principal, direccion_operador, pagina_web_operador, soporte, image, foto_operador) 
			VALUES ('".$_POST['id_operador']."', '".$_POST['nombre_operador']."', '".$_POST['resena_operador']."',
			 '".$_POST['nombre_sede_principal']."', '".$_POST['direccion_operador']."', '".$_POST['pagina_web_operador']."',
			 '".$_POST['soporte']."', '".$_POST['image']."', '".$_POST['foto_operador']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado los datos del Operador ".$_POST['nombre_operador']."
			 Por favor, ingrese los servicios de este Operador</font>";
			 include_once("025.php");
			echo "</div><br><br><br><br>";
			unset($_POST["024"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>