<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select_2="SELECT * FROM operador";
	$this->acceso_db->registro_db($this->cadena_select_2,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
?>
<div align="left"><br>
  <br>
  <table width="720" border="0" cellspacing="4" cellpadding="1">
    <tr>
      <td width="580" valign="top">
<div align="center"> <? echo "<div align='center'><font face='Arial, Helvetica, sans-serif' color='#000033' size='2'>Estos son los operadores que se encuentran registrados en el Sistema.<br>
	Para una descripci&oacute;n detallada, haga clic en el v&iacute;nculo correspondiente.<br><br></font></div>"; ?> 
          <table width="134" border="0" cellspacing="4" cellpadding="1">
            <?	
	for($j=0; $j<$conteo; $j++)
	{
?>
            <tr><td width="124"><div align="left"><strong><a href="034.php?op=<? echo $registro[$j][0] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                  <? echo $registro[$j][1]."<br><br>"; ?></a></strong></div></td></tr><?	}
?>
          </table>
        </div></td>
      <td width="124" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br></div>
