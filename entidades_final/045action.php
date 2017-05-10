<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$institucion = $_GET['es'];
	$this->cadena_select_2="SELECT * FROM institucion WHERE id_institucion='".$institucion."'";
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
            <td width="124" rowspan="7" valign="top" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; ?> </font></strong></div>
              <p align="center"><strong><a href="044.php?ess=<? echo $registro[0][0] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                Servicios</a></strong></p></td>
            <td colspan="2" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Nombre 
                del Director<br></strong> </font> &nbsp; 
                <?
	$this->cadena_select_med="SELECT * FROM medico WHERE nombre_medico like '%".$registro[0][3]."%' and apellido_medico like '%".$registro[0][4]."%'";
	//echo $this->cadena_select_med;
	$this->acceso_db->registro_db($this->cadena_select_med,0);//ejecutar cadena 
	$conteo_med=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	if ($conteo_med==0){
				 echo $registro[0][3]; echo " ".$registro[0][4]; 
	}
	else
	{$registro_med=$this->acceso_db->obtener_registro_db();
              ?>
                <div align="center"><strong><a href="049.php?ifm=<? echo $registro_med[0][0] ?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                <? echo $registro[0][3]; echo " ".$registro[0][4]; ?></a></strong></div>	<?
	}?>
              </div></td>
            <td width="204" rowspan="3" bgcolor="#FFFFFF" class="table"> 
              <? if (($registro[0][2])!=""){?>
              <div align="center"> <img src="<? echo $registro[0][2];?>" width="200" height="200"> 
              </div>
              <? } ?>
            </td>
          </tr>
          <tr> 
            <td colspan="2" valign="top" class="table"> <div align="left"> 
                <p><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Direcci&oacute;n 
                  de la Instituci&oacute;n</strong> <br>
                  </font> &nbsp; 
                  <?
  	$this->cadena_select="SELECT * FROM pais WHERE id_pais='".$registro[0][6]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_pais=$this->acceso_db->obtener_registro_db();
  	$this->cadena_select="SELECT * FROM departamento WHERE id_departamento='".$registro[0][7]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_departamento=$this->acceso_db->obtener_registro_db();
  	$this->cadena_select="SELECT * FROM ciudad WHERE id_ciudad='".$registro[0][8]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_ciudad=$this->acceso_db->obtener_registro_db();
 echo $registro[0][5];?>
                  <br>
                  <? echo "Ubicada en ";
if(($registro[0][9])!="")
{
  	$this->cadena_select="SELECT * FROM localidad WHERE id_localidad='".$registro[0][9]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_localidad=$this->acceso_db->obtener_registro_db();
	echo "la localidad ".$registro_localidad[0][1]." de ";
}	
				echo $registro_ciudad[0][1].", ".$registro_departamento[0][1].", en ".
				$registro_pais[0][1].".";?></p>
              </div></td>
          </tr>
          <tr> 
            <td height="35" colspan="2" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>PBX/Tel&eacute;fono</strong><br>
                </font> &nbsp;<? echo $registro[0][10];?></div></td>
          </tr>
          <tr> 
            <td colspan="3" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Direcci&oacute;n 
                en Internet </strong><br>
                </font> &nbsp;<a href="<? echo $registro[0][11];?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                <? echo $registro[0][11];?></a></div></td>
          </tr>
          <tr> 
            <td colspan="3" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Correo 
              Electr&oacute;nico </strong><br>
              </font> &nbsp;<a href="mailto:<? echo $registro[0][12];?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
              <? echo $registro[0][12];?></td>
          </tr>
          <tr> 
            <td colspan="3" valign="top" class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Clase 
                de Instituci&oacute;n</strong><br>
                </font> &nbsp; 
                <?
  	$this->cadena_select="SELECT * FROM clase_institucion WHERE id_clase_institucion='".$registro[0][13]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_institucion=$this->acceso_db->obtener_registro_db();
				 echo $registro_institucion[0][1];?>
              </div></td>
          </tr>
          <tr> 
            <td width="152" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Nivel 
              de Atenci&oacute;n</strong><br>
              </font> &nbsp;<? echo $registro[0][14];?></td>
            <td colspan="2" valign="top" class="table"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Nit</strong><br>
              </font> &nbsp;<? echo $registro[0][15];?></td>
          </tr>
        </table>
      </td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
