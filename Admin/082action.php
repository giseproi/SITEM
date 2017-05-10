<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$code=$_POST['id'];
	$tabla=$_POST['tabla'];
	$this->cadena_select="SELECT * FROM ".$tabla." WHERE id_".$tabla."='".$code."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro=$this->acceso_db->obtener_registro_db();
	$this->result = mysql_query($this->cadena_select);
	$meta = mysql_fetch_field($this->result); 
	$id=$meta->name;
	$id_valor=$_POST[$id];
	$cadena="";
	for($j=0; $j<mysql_num_fields($this->result); $j++)
	{if ($j==0)
	{$cadena=$cadena."".$meta->name."='".$_POST[$meta->name]."'";}
	else
	{$cadena=$cadena.",".$meta->name."='".$_POST[$meta->name]."'";}
	$meta = mysql_fetch_field($this->result); 
	}
	//echo $cadena;
	$this->cadena_update="update ".$tabla." set ".$cadena." WHERE id_".$tabla." = '".$code."'";
	//echo $this->cadena_update;
	$actualizar=$this->acceso_db->ejecutar_acceso_db($this->cadena_update);
			if ($actualizar)
			{echo "<br><br><br><br><div align='center'><font size='2' face='Arial, Helvetica, sans-serif' color='#000033'>
			<br><br> Se han ingresado correctamente los datos de la tabla ".$tabla."
					<br><br><br><br><br><br></font>";
			?><strong><a href="080.php" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                  Volver</a></strong><?
			echo "</div><br><br><br><br>";
			}
			else
			{echo "<br><br><br><br><br>
			<p align='center'>_______________________________________________
			<br><br><br><br><br>
			Ha ocurrido un error. Vuelva a intentar
			<br><br><br><br>
			_______________________________________________
			<br><br><br><br><br><br></p>";}
	?>