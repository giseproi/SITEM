<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$operador = $_GET['op'];
	$this->cadena_select_2="SELECT * FROM operador WHERE id_operador='".$operador."'";
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
            <td width="137" rowspan="5" valign="top" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; ?> </font></strong></div>
              <p align="center"><strong><a href="034.php?ops=<? echo $registro[0][0] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                Servicios</a></strong></p>
              <? if (($registro[0][7])!=""){?>
              <p align="center"><img src="<? echo $registro[0][7];?>"> </p>
              <? } ?>
            </td>
            <td width="273" valign="top" class="table"> 
              <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Rese&ntilde;a 
                Hist&oacute;rica</strong> <br>
                </font> &nbsp;<? echo $registro[0][2];?> </div></td>
            <td width="152" rowspan="3" bgcolor="#FFFFFF" class="table"><img src="images/tn120.jpg" width="200" height="200"></td>
          </tr>
          <tr> 
            <td valign="top" class="table"> 
              <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Nombre 
                de la Sede Principal</strong> <br>
                </font> &nbsp;<? echo $registro[0][3];?></div></td>
          </tr>
          <tr> 
            <td valign="top" class="table"> 
              <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Direcci&oacute;n 
                de la Sede Principal </strong><br>
                </font> &nbsp;<? echo $registro[0][4];?></div></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> 
              <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Direcci&oacute;n 
                en Internet </strong><br>
                </font> &nbsp;<a href="http://<? echo $registro[0][5];?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                <? echo $registro[0][5];?></a></div></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> 
              <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Contacto 
                </strong></font><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><br>
                </font> &nbsp;<a href="http://<? echo $registro[0][6];?> " class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                <? echo $registro[0][6];?></a></div></td>
          </tr>
        </table></td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
