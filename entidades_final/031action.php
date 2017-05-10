<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$especialidad = $_POST['especialidad'];
	$codigo_especialidad = $_POST['id_especialidad'];
	$this->cadena_select_1="SELECT * FROM especialidad WHERE especialidad='".$especialidad."'";
	$this->cadena_select_2="SELECT * FROM especialidad WHERE id_especialidad='".$codigo_especialidad."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de la Especialidad ".$especialidad." ya existe. Ingrese otra Especialidad. "; ?><a href="031.php">Volver</a><br><br><? // especialidad ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de la Especialidad ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="031.php">Volver</a><br><br><? // especialidad ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO especialidad (id_especialidad, especialidad) 
			VALUES ('".$_POST['id_especialidad']."', '".$_POST['especialidad']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br><br><br><br><br>
			Se ha ingresado el nombre de la Especialidad ".$_POST['especialidad']."
					<br><br><br><br><br><br>";
					unset($_POST["031"]);}
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