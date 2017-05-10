<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_clase_institucion) from clase_institucion";
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
echo "<br>";
?>
<form name="form1" method="post" action="010.php">
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#000033" size="3" face="Arial, Helvetica, sans-serif">Clase 
            de Instituci&oacute;n</font><br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="426" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="191"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">C&oacute;digo 
                  de la Clase de Institucion</font></font></div></td>
              <td width="186"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="id_clase_institucion" value=" <? echo $maximo; ?> " readonly="readonly"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Nombre 
                  de la Clase de Institucion</font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="clase_institucion"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <br>
                <input type="submit" name="010" value="Enviar">
                </font></strong> </tr>
          </table></td>
        <td width="23%" align="left" valign="top">
          <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
        </td>
      </tr>
    </table>
  </div>
</form>
