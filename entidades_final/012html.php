<form name="form1" method="post" action="012.php">
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#000033" size="3" face="Arial, Helvetica, sans-serif">Servicios 
            de las Instituciones y Sedes</font><br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="138"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Instituci&oacute;n</font></font></div></td>
              <td width="229"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_institucion">
                  <?
					$cadena = "SELECT * FROM institucion";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_institucion"];?>'> <? echo $registro["nombre_institucion"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Sede</font></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_sede">
                  <?
					$cadena = "SELECT * FROM sede";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_sede"];?>'> <? echo $registro["nombre_sede"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Servicio</font></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_servicio_medico">
                  <?
					$cadena = "SELECT * FROM servicio_medico";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_servicio_medico"];?>'> 
                  <? echo $registro["servicio_medico"]; ?> </option>
                  <?
					 };
					 ?>
                </select>
                </font></strong></td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <br>
                <input type="submit" name="012" value="Enviar">
                </font></strong></td>
            </tr>
          </table></td>
        <td width="23%" align="left" valign="top">
          <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
        </td>
      </tr>
    </table>
  </div>
</form>
<div align="center"> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
  <?
echo "<br><br><br><br><br><br><br><br>";
?>
  </font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"></font></div>
