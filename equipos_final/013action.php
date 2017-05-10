<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$marca = $_POST['id_marca'];
	$modelo = $_POST['modelo'];
	$equipo_medico = $_POST['nombre_equipo_medico'];
	$codigo_equipo = $_POST['id_equipo_medico'];
	$this->cadena_select_1="SELECT * FROM equipo_medico WHERE nombre_equipo_medico='".$equipo_medico."' and id_marca='".$marca."'and modelo='".$modelo."'";
	$this->cadena_select_2="SELECT * FROM equipo_medico WHERE id_equipo_medico='".$codigo_equipo."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{  
			echo "<br><br><br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
			<br> Los datos del Equipo ".$equipo_medico." ya existen. "; ?>
 &nbsp; <strong><a href='013.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
 Ingrese otro Equipo </a><br><br><? echo "</font></div>"; ?>
<br><br><br><br><br><br><br></strong>
  <br>
	<?	
		
		
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
					echo "<div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'><br>
					<br> El c&oacute;digo del Equipo ya existe. Actualice la p&aacute;gina e  "; ?>
<strong>
<a href='013.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
ingrese nuevamente los datos.</a> <? echo "</font></div>"; ?> </strong><br>
  <br>
  <? // nombre_operador ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO equipo_medico (id_equipo_medico, nombre_equipo_medico, id_marca, modelo,
			tension_nominal, corriente, consumo_potencia, id_tecnologia, id_interfaz, id_clase_biomedica, foto_equipo, detalle_equipo, detalle_instalacion ) 
			VALUES ('".$_POST['id_equipo_medico']."', '".$_POST['nombre_equipo_medico']."', '".$_POST['id_marca']."',
			'".$_POST['modelo']."', '".$_POST['tension_nominal']."', '".$_POST['corriente']."', '".$_POST['consumo_potencia']."',
			'".$_POST['id_tecnologia']."', '".$_POST['id_interfaz']."', '".$_POST['id_clase_biomedica']."', '".$_POST['foto_equipo']."',
			 '".$_POST['detalle_equipo']."', '".$_POST['detalle_instalacion']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado correctamente los datos del Equipo ".$_POST['nombre_equipo_medico']."
					<br><br><br><br><br><br></font>";
			echo "</div><br><br><br><br>";
					unset($_POST["013"]);}
			else
			{echo "<br><br><br><br><br>
			<p align='center'>_______________________________________________
			<br><br><br><br><br>
			Ha ocurrido un error. Vuelva a intentar
			<br><br><br><br>
			_______________________________________________
			<br><br><br><br><br><br></p>";}
		}
		}	
?>