<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$tecnologia = $_GET['it'];
	$this->cadena_select_2="SELECT * FROM tecnologia_conexion WHERE id_tecnologia_conexion='".$tecnologia."'";
	$this->acceso_db->registro_db($this->cadena_select_2,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
	echo "<br><br>";
?>
<div align="center"> 
  <table width="700" border="0" cellspacing="4" cellpadding="1">
    <tr>
      <td width="580"><table width="580" border="0" cellpadding="0" cellspacing="4" class="table">
          <tr class="table"> 
            <td width="137" rowspan="6" valign="top" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; ?> </font></strong></div>
              <p align="center"><strong><a href="040.php?mt=<? echo $registro[0][5] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                Medio de Transmisi&oacute;n</a></strong></p>
            </td>
            <td width="273" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Descripci&oacute;n 
                de la Tecnolog&iacute;a</strong><br>
                </font> &nbsp;<? echo $registro[0][2];?> </div></td>
            <td width="152" rowspan="3" bgcolor="#FFFFFF" class="table"><img src="images/121.jpg" width="204" height="191"></td>
          </tr>
          <tr> 
            <td valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Velocidad 
                de Transmisi&oacute;n</strong><br>
                </font> &nbsp;<? echo $registro[0][3];?></div></td>
          </tr>
          <tr> 
            <td valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>M&eacute;todo 
                de Se&ntilde;alizaci&oacute;n</strong><br>
                </font> &nbsp;<? echo $registro[0][4];?></div></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Longitud 
                M&aacute;xima del Medio de Transmisi&oacute;n</strong><br>
                </font> &nbsp;<? echo $registro[0][6];?></div></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Topolog&iacute;a</strong><br>
                </font> &nbsp;<? echo $registro[0][7];?></div></td>
          </tr>
          <tr>
            <td colspan="2" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Protocolo</strong><br>
              </font> &nbsp;<? echo $registro[0][8];?></td>
          </tr>
        </table></td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
