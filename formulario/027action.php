<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_clase_biomedica = $_POST['nombre_clase_biomedica'];
	$codigo_clase_biomedica = $_POST['id_clase_biomedica'];
	$this->cadena_select_1="SELECT * FROM clase_biomedica WHERE nombre_clase_biomedica='".$nombre_clase_biomedica."'";
	$this->cadena_select_2="SELECT * FROM clase_biomedica WHERE id_clase_biomedica='".$codigo_clase_biomedica."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Clase Biom&eacute;dica ".$nombre_clase_biomedica." ya existe. Ingrese otro Nombre. "; ?><a href="027.php">Volver</a><br><br><? // nombre_clase_biomedica ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Clase Biom&eacute;dica ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="027.php">Volver</a><br><br><? // nombre_clase_biomedica ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO clase_biomedica (id_clase_biomedica, nombre_clase_biomedica) 
			VALUES ('".$_POST['id_clase_biomedica']."', '".$_POST['nombre_clase_biomedica']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de la Clase Biom&eacute;dica ".$_POST['nombre_clase_biomedica']."<br><br>";
			unset($_POST["027"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>