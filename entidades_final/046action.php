<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$institucion = $_GET['ess'];
	$this->cadena_select="SELECT * FROM servicio_sede WHERE id_institucion='".$institucion."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
?>
<div align="left"><br>
  <br>
  <table width="720" border="0" cellspacing="4" cellpadding="1">
    <tr>
      <td width="580" valign="top">
<div align="center"> <?
	$this->cadena_select="SELECT * FROM institucion WHERE id_institucion='".$institucion."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_institucion=$this->acceso_db->obtener_registro_db();

 echo "<font face='Arial, Helvetica, sans-serif' color='#000033' size='2'>Estos son los servicios de <strong>".$registro_institucion[0][1]."</strong> que se encuentran registrados en el Sistema.<br>
	Para una descripci&oacute;n detallada, haga clic en el v&iacute;nculo correspondiente.<br><br></font>";?> 
          <table width="134" border="0" cellspacing="4" cellpadding="1">
            <?	
	for($j=0; $j<$conteo; $j++)
	{
?>
            <tr>
              <td width="124" valign="top">
<div align="left"><strong><a href="044.php?essd=<? echo $registro[$j][2] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                  <?
	$this->cadena_select="SELECT * FROM servicio_medico WHERE id_servicio_medico='".$registro[$j][2]."'";
	//echo $this->cadena_select;
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_servicio=$this->acceso_db->obtener_registro_db();
				   echo $registro_servicio[0][1]."<br><br>"; ?></a></strong></div></td></tr><?	}
?>
          </table>
        </div></td>
      <td width="124" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br></div>
