<?
echo "<br>";
?> 
<div align="center">


  <p><font color="#0033CC" size="4" face="Arial, Helvetica, sans-serif"> 
    </font> </p>
</div>
<form name="form1" method="post" action="014.php">
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Ubicaci&oacute;n 
            del Equipo<br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="580" border="0" cellspacing="4" cellpadding="0">
            <tr> 
              <td width="35%"><div align="right"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Equipo</font></strong></div></td>
              <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_equipo_medico" >
                  <?
					$cadena = "SELECT * FROM equipo_medico";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_equipo_medico "];?>'> <? echo $registro["nombre_equipo_medico"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="right"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Servicio</font></strong></div></td>
              <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_servicio_medico" >
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
              <td rowspan="3"><div align="right"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Ubicaci&oacute;n</font></strong></div></td>
              <td width="18%"><div align="right"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Instituci&oacute;n</font></strong></div></td>
              <td width="47%"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
              <td><div align="right"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Sede</font></strong></div></td>
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
              <td><div align="right"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Dependencia</font></strong></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_dependencia">
                  <?
					$cadena = "SELECT * FROM dependencia";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_dependencia"];?>'> <? echo $registro["nombre_dependencia"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font></strong></td>
            </tr>
            <tr> 
              <td colspan="3" align="center"> <p><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="submit" name="014" value="Enviar">
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
              <td><a href="equipos.php" class="unnamed2" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >Equipos 
                de Telemedicina</a></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </div>
</form>
<div align="center"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
  <?
  echo "<br><br>";
?>
  </font></strong> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
  </font></strong></div>
