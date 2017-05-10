<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select_2="SELECT * FROM servicio_sede";
	$this->acceso_db->registro_db($this->cadena_select_2,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
?>
<div align="left"><br>
  <br>
  <table width="720" border="0" cellspacing="4" cellpadding="1">
    <tr>
      <td width="580" valign="top">
<div align="center"> <? echo "<font face='Arial, Helvetica, sans-serif' color='#000033' size='2'>Estos son los servicios que se encuentran registrados en el Sistema.<br>
	Para una descripci&oacute;n detallada, haga clic en el v&iacute;nculo correspondiente.<br></font>";?> 
          <table width="434" border="0" cellspacing="4" cellpadding="1">
            <?	
	for($j=0; $j<$conteo; $j++)
	{
?>
            <tr> 
              <td width="211" valign="top"> <div align="left"><strong><a href="044.php?essd=<? echo $registro[$j][2] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                  <?
	$this->cadena_select="SELECT * FROM servicio_medico WHERE id_servicio_medico='".$registro[$j][2]."'";
	//echo $this->cadena_select;
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_servicio=$this->acceso_db->obtener_registro_db();
				   echo $registro_servicio[0][1]."<br><br>"; ?></a></strong></div></td>
              <td width="207" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;
                <?
	$institucion = $registro[$j][0];
	$this->cadena_select_1="SELECT * FROM institucion WHERE id_institucion='".$institucion."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);//ejecutar cadena
	$registro_1=$this->acceso_db->obtener_registro_db();
	echo $registro_1[0][1];
			  ?>
                </font></td>
            </tr>
            <?	}
?>
          </table>
        </div></td>
      <td width="124" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br></div>
