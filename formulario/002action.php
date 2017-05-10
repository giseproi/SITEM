<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$nombre_pais = $_POST['nombre_pais'];
	$codigo_pais = $_POST['id_pais'];
	$this->cadena_select_1="SELECT * FROM pais WHERE nombre_pais='".$nombre_pais."'";
	$this->cadena_select_2="SELECT * FROM pais WHERE id_pais='".$codigo_pais."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo>0)
		{ 
			echo "<br><br> El nombre de Pa&iacute;s ".$nombre_pais." ya existe. Ingrese otro nombre de Pa&iacute;s. "; ?><a href="002.php">Volver</a><br><br><? // pais ya existe
		} 
		else
		{
			$this->acceso_db->registro_db($this->cadena_select_2,0);
			$conteo=$this->acceso_db->obtener_conteo_db();
			if ($conteo>0)
					{ 
						echo "<br><br> El c&oacute;digo de Pa&iacute;s ya existe. Actualice la p&aacute;gina e ingrese nuevamente los datos. "; ?><a href="002.php">Volver</a><br><br><? // pais ya existe
					} 
					else
					{

			$this->cadena_insert="INSERT INTO pais (id_pais, nombre_pais) 
			VALUES ('".$_POST['id_pais']."', '".$_POST['nombre_pais']."')";
			$this->acceso_db->especificar_enlace($this->enlace);
			$insertar=$this->acceso_db->ejecutar_acceso_db($this->cadena_insert);
			if ($insertar)
			{echo "<br><br> Se ha ingresado el nombre de Pa&iacute;s ".$_POST['nombre_pais']."<br><br>";}
			else
			{echo "<br>_______________________________________________
			<br>Ha ocurrido un error. Vuelva a intentar
				   <br>_______________________________________________";}
		}
		}	
?>