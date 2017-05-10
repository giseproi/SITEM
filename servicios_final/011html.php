<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_servicio_medico) from servicio_medico";
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
<form name="form1" method="post" action="011.php">
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>FALTA 
            TITULO<br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="410" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="137"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">C&oacute;digo 
                  del servicio</font></font></div></td>
              <td width="261"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="id_servicio_medico" value="<? echo $maximo; ?> " readonly="readonly"size="26">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Nombre 
                  del servicio</font></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="servicio_medico"size="26">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Detalles 
                  del Servicio</font></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <textarea name="detalle_servicio"></textarea>
                </font></strong></td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> <p><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="submit" name="011" value="Enviar">
                  </font></strong></p>
                <p>&nbsp;</p></td>
            </tr>
          </table></td>
        <td width="23%" align="left" valign="top"><table width="130" border="0" align="center" cellpadding="1" cellspacing="2">
            <tr> 
              <td bgcolor="#000033"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>M&oacute;dulos</strong></font></div></td>
            </tr>
            <tr> 
              <td><a href="../operadores_final/operadores.php" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Operadores 
                de Telecomunicaciones</a></td>
            </tr>
            <tr> 
              <td><a href="entidades.html" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Entidades 
                de Salud</a></td>
            </tr>
            <tr> 
              <td><a href="../tecnologias_final/tecnologias.php" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Tecnolog&iacute;as 
                de Interconexi&oacute;n</a></td>
            </tr>
            <tr> 
              <td><a href="../organizaciones_final/organizaciones.html" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Organizaciones 
                en Telemedicina</a></td>
            </tr>
            <tr> 
              <td><a href="../servicios_final/servicios.html" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Servicios 
                Telem&eacute;dicos</a></td>
            </tr>
            <tr> 
              <td><a href="../equipos_final/equipos.php" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Equipos 
                de Telemedicina</a></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </div>
</form>
<div align="center"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
  <?
echo "<br><br><br>";
?>
  </font></strong> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
  </font></strong></div>
