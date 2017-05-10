<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$clase_institucion = $_POST['clase_institucion'];
	$codigo_clase_institucion = $_POST['id_clase_institucion'];
	$this->cadena_select_1="SELECT * FROM clase_institucion WHERE clase_institucion='".$clase_institucion."'";
	$this->cadena_select_2="SELECT * FROM clase_institucion WHERE id_clase_institucion='".$codigo_clase_institucion."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Clase de Instituci&oacute;n ".$clase_institucion." ya existe. Ingrese otra Clase de Instituci&oacute;n. "; ?><a href="010.php">Volver</a><br><br><? // clase_institucion ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Clase de Instituci&oacute;n ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="010.php">Volver</a><br><br><? // clase_institucion ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO clase_institucion (id_clase_institucion, clase_institucion) 
			VALUES ('".$_POST['id_clase_institucion']."', '".$_POST['clase_institucion']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br><br><br><br><br>
			Se ha ingresado el nombre de la Clase de Instituci&oacute;n ".$_POST['clase_institucion']."
					<br><br><br><br><br><br>";
					unset($_POST["010"]);}
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