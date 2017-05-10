<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_topologia = $_POST['nombre_topologia'];
	$codigo_clase_topologia = $_POST['id_topologia'];
	$this->cadena_select_1="SELECT * FROM clase_topologia WHERE nombre_topologia='".$nombre_topologia."'";
	$this->cadena_select_2="SELECT * FROM clase_topologia WHERE id_topologia='".$codigo_clase_topologia."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Topolog&iacute;a ".$nombre_topologia." ya existe. Ingrese otro nombre de Topolog&iacute;a de Red. "; ?><a href="021.php">Volver</a><br><br><? // nombre_topologia ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Topolog&iacute;a de Red ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="021.php">Volver</a><br><br><? // nombre_topologia ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO clase_topologia (id_topologia, nombre_topologia) 
			VALUES ('".$_POST['id_topologia']."', '".$_POST['nombre_topologia']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Topolog&iacute;a de Red ".$_POST['nombre_topologia']."<br><br>";
			unset($_POST["021"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>