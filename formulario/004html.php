<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_ciudad) from ciudad";
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
echo "<br><br><br><br>";
?> 
<div align="center">
  <p>&nbsp;</p>
  <p><strong><font color="#0033CC" size="4" face="Arial, Helvetica, sans-serif">Ciudad 
    </font></strong></p>
  <p>&nbsp; </p>
</div>
<form name="form1" method="post" action="004.php">
  <div align="center"> 
    <table width="580" border="0" cellspacing="4" cellpadding="0">
      <tr> 
        <td width="260"><div align="right"><font size="2"><strong><font color="#000033" face="Arial, Helvetica, sans-serif">C&oacute;digo 
            de la Ciudad</font></strong></font></div></td>
        <td width="320"><font size="2"><strong><font color="#000033" face="Arial, Helvetica, sans-serif"> 
          <input type="text" name="id_ciudad" value=" <? echo $maximo; ?> " readonly="readonly">
          </font></strong></font></td>
      </tr>
      <tr> 
        <td><div align="right"><font size="2"><strong><font color="#000033" face="Arial, Helvetica, sans-serif">Nombre 
            de la Ciudad</font></strong></font></div></td>
        <td><font size="2"><strong><font color="#000033" face="Arial, Helvetica, sans-serif"> 
          <input type="text" name="nombre_ciudad">
          </font></strong></font></td>
      </tr>
      <tr> 
        <td colspan="2" align="center"> <font size="2"><strong><font color="#000033" face="Arial, Helvetica, sans-serif"> 
          <input type="submit" name="004" value="Enviar">
          </font></strong></font></td>
      </tr>
    </table>
  </div>
</form>
<div align="center"><font size="2"><strong><font color="#000033" face="Arial, Helvetica, sans-serif"> 
  <?
echo "<br><br><br><br><br><br><br><br>";
?>
  </font></strong></font><strong><font color="#000033" size="4" face="Arial, Helvetica, sans-serif"> 
  </font></strong></div>
