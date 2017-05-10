<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$servicio_operador = $_GET['opsd'];
	$this->cadena_select_2="SELECT * FROM servicio_operador WHERE id_servicio_operador='".$servicio_operador."'";
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
            <td width="118" rowspan="8" valign="top" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][2]; ?> </font></strong></div>
              <p align="center"><strong><a href="034.php?opst=<? echo $registro[0][1] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                Tarifas</a></strong></p></td>
            <?
	$this->cadena_select_1="SELECT * FROM servicio_telecom WHERE id_servicio_telecom='".$registro[0][0]."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);//ejecutar cadena
	$registro_1=$this->acceso_db->obtener_registro_db();

?>
            <td width="242" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Servicio 
                de Telecomunicaci&oacute;n Utilizado</strong><br>
                </font> &nbsp;<? echo $registro_1[0][1];?> </div></td>
            <td width="204" rowspan="4" bgcolor="#FFFFFF" class="table"><img src="images/tn120.jpg" width="204" height="191"></td>
          </tr>
          <tr> 
            <td class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Disponibilidad</strong><br>
                </font> &nbsp;<? echo $registro[0][4];?> </div></td>
          </tr>
          <tr> 
            <td class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Cobertura</strong><br>
                </font> &nbsp;<? echo $registro[0][5];?></div></td>
          </tr>
          <tr> 
            <td class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Requisitos 
                del Servicio</strong><br>
                </font> &nbsp;<? echo $registro[0][6];?></div></td>
          </tr>
          <tr> 
            <td colspan="2" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Ventajas 
                del Servicio</strong><br>
                </font> &nbsp;<? echo $registro[0][7];?></div></td>
          </tr>
          <tr> 
            <?
	$this->cadena_select="SELECT * FROM medio_transmision WHERE id_medio_transmision='".$registro[0][8]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_2=$this->acceso_db->obtener_registro_db();

?>
            <td colspan="2" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Medio 
                de Transmisi&oacute;n</strong><br>
                </font> &nbsp;<? echo $registro_1[0][1];?></div></td>
          </tr>
          <tr> 
            <td colspan="2" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Ancho 
                de Banda</strong><br>
                </font> &nbsp;<? echo $registro[0][9];?></div></td>
          </tr>
          <tr> 
            <td colspan="2"class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Velocidad 
              de Transmisi&oacute;n</strong><br>
              </font> &nbsp;<? echo $registro[0][10];?></td>
          </tr>
        </table></td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
