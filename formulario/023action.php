<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_protocolo = $_POST['nombre_protocolo'];
	$codigo_protocolo = $_POST['id_protocolo'];
	$this->cadena_select_1="SELECT * FROM protocolo WHERE nombre_protocolo='".$nombre_protocolo."'";
	$this->cadena_select_2="SELECT * FROM protocolo WHERE id_protocolo='".$codigo_protocolo."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre del Protocolo de Red ".$nombre_protocolo." ya existe. Ingrese otro Nombre. "; ?><a href="023.php">Volver</a><br><br><? // nombre_protocolo ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo del Protocolo de Red ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="023.php">Volver</a><br><br><? // nombre_protocolo ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO protocolo (id_protocolo, nombre_protocolo) 
			VALUES ('".$_POST['id_protocolo']."', '".$_POST['nombre_protocolo']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre del Protocolo de Red ".$_POST['nombre_protocolo']."<br><br>";
			unset($_POST["023"]);}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>