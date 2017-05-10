<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_departamento = $_POST['nombre_departamento'];
	$codigo_departamento = $_POST['id_departamento'];
	$this->cadena_select_1="SELECT * FROM departamento WHERE nombre_departamento='".$nombre_departamento."'";
	$this->cadena_select_2="SELECT * FROM departamento WHERE id_departamento='".$codigo_departamento."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de Departamento/Estado ".$nombre_departamento." ya existe. Ingrese otro nombre de Departamento/Estado. "; ?><a href="003.php">Volver</a><br><br><? // departamento ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de Departamento/Estado ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="003.php">Volver</a><br><br><? // departamento ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO departamento (id_departamento, nombre_departamento) 
			VALUES ('".$_POST['id_departamento']."', '".$_POST['nombre_departamento']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de Departamento/Estado ".$_POST['nombre_departamento']."<br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>