<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$equipo = $_GET['eq'];
	$this->cadena_select_2="SELECT * FROM equipo_medico WHERE id_equipo_medico='".$equipo."'";
	$this->acceso_db->registro_db($this->cadena_select_2,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
	echo "<br><br>";
?>
<div align="center"> 
  <table width="700" border="0" cellspacing="4" cellpadding="1">
    <tr>
      <td width="580" align="center" valign="top"> 
        <table width="580" border="0" cellpadding="0" cellspacing="4" class="table">
          <tr class="table"> 
            <td width="124" rowspan="10" valign="top" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; ?> </font></strong></div></td>
            <td valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Marca<br>
                </strong> </font> &nbsp; 
                <?
	$this->cadena_select_marca="SELECT * FROM marca WHERE id_marca='".$registro[0][2]."'";
	//echo $this->cadena_select_med;
	$this->acceso_db->registro_db($this->cadena_select_marca,0);//ejecutar cadena 
	$registro_marca=$this->acceso_db->obtener_registro_db(); // obtener numero de registros en la db
				 echo $registro_marca[0][1];?>
              </div></td>
            <td width="204" rowspan="4" bgcolor="#FFFFFF" class="table"> 
              <? if (($registro[0][10])!=""){?>
              <div align="center"> <img src="<? echo $registro[0][10];?>" width="200" height="200"> 
              </div>
              <? } ?>
            </td>
          </tr>
          <tr> 
            <td valign="top" class="table"> <div align="left"> 
                <p><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Modelo</strong> 
                  <br>
                  </font> &nbsp; <? echo $registro[0][3];?><br>
                </p>
              </div></td>
          </tr>
          <tr> 
            <td height="15" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Tensi&oacute;n 
                Nominal </strong><br>
                </font> &nbsp;<? echo $registro[0][4];?></div></td>
          </tr>
          <tr> 
            <td height="16" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Corriente</strong><br>
              </font> &nbsp;<? echo $registro[0][5];?></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Consumo 
                de Potencia</strong><br>
                </font> &nbsp;<? echo $registro[0][6];?></div></td>
          </tr>
          <tr> 
            <?		  
  	$this->cadena_select="SELECT * FROM tecnologia WHERE id_tecnologia='".$registro[0][7]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_tecnologia=$this->acceso_db->obtener_registro_db();

  	$this->cadena_select="SELECT * FROM interfaz WHERE id_interfaz='".$registro[0][8]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_interfaz=$this->acceso_db->obtener_registro_db();

  	$this->cadena_select="SELECT * FROM clase_biomedica WHERE id_clase_biomedica='".$registro[0][9]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_clase=$this->acceso_db->obtener_registro_db();
?>
            <td colspan="2" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Tecnolog&iacute;a</strong><br>
              </font> &nbsp;<? echo $registro_tecnologia[0][1];?></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Interfaz</strong><br>
                </font> &nbsp; <? echo $registro_interfaz[0][1];?> </div></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Clasificaci&oacute;n 
              Biom&eacute;dica </strong><br>
              </font> &nbsp;<? echo $registro_clase[0][1];?></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Detalles 
              del Equipo</strong><br>
              </font> &nbsp;<? echo $registro[0][11];?></td>
          </tr>
          <tr>
            <td colspan="2" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Detalles 
              de Instalaci&oacute;n</strong><br>
              </font> &nbsp;<? echo $registro[0][12];?></td>
          </tr>
        </table>
      </td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
