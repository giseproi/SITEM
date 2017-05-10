<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_red) from red";
	$this->acceso_db->registro_db($this->cadena_select,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo==0)
		{ 
			$maximo = 0; // se asigna el número cero, caso contrario..
		} 
		else
		{
			$maximo=$this->acceso_db->obtener_registro_db();
			$maximo=$maximo[0][0];
			$maximo++;
		}
?> 
<form name="form1" method="post" action="018.php">
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#000033" size="3" face="Arial, Helvetica, sans-serif">Redes</font><br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="369" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="171"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">C&oacute;digo 
                  de la Red</font></font></div></td>
              <td width="186"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="id_red" value=" <? echo $maximo; ?> " readonly="readonly"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td height="25"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Topolog&iacute;a</font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_topologia" >
                    <?
					$cadena = "SELECT * FROM clase_topologia";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                    <option value='<? echo $registro["id_topologia"];?>'> <? echo $registro["nombre_topologia"]; ?> 
                    </option>
                    <?
					 };
					 ?>
                  </select>
                  </font></div></td>
            </tr>
            <tr> 
              <td> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Medio 
                  de Transmisi&oacute;n o</font> <font color="#000033">Conexi&oacute;n 
                  de Red</font></font></p></td>
              <td> <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_medio_transmision" >
                    <?
					$cadena = "SELECT * FROM medio_transmision";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                    <option value='<? echo $registro["id_medio_transmision"];?>'> 
                    <? echo $registro["nombre_medio_transmision"]; ?> </option>
                    <?
					 };
					 ?>
                  </select>
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Protocolo</font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_protocolo" >
                    <?
					$cadena = "SELECT * FROM protocolo";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                    <option value='<? echo $registro["id_protocolo"];?>'> <? echo $registro["nombre_protocolo"]; ?> 
                    </option>
                    <?
					 };
					 ?>
                  </select>
                  </font></div></td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> <p align="center"> <font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                  <br>
                  <input type="submit" name="018" value="Enviar">
                  </font></font></p>
                <p align="left">&nbsp; </p></td>
            </tr>
          </table></td>
        <td width="23%" align="left" valign="top">
          <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
        </td>
      </tr>
    </table>
  </div>
</form>
<div align="center"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
  <?
?>
  </font></strong></div>
