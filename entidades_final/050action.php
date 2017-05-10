<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$medico = $_GET['ifm'];
	$this->cadena_select="SELECT * FROM medico WHERE id_usuario='".$medico."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
	echo "<br><br>";
?>
<div align="center"> 
  <table width="700" border="0" cellspacing="4" cellpadding="1">
    <tr>
      <td width="580" align="center" valign="top"> 
        <table width="580" border="0" cellpadding="0" cellspacing="4">
          <tr > 
            <td width="124" rowspan="2" valign="top" > <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; echo " ".$registro[0][2]; ?> </font></strong></div></td>
            <? 	$this->cadena_select="SELECT * FROM pais WHERE id_pais='".$registro[0][9]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_pais=$this->acceso_db->obtener_registro_db();
	//echo $this->cadena_select;
  	$this->cadena_select="SELECT * FROM ciudad WHERE id_ciudad='".$registro[0][11]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_ciudad=$this->acceso_db->obtener_registro_db();

  	$this->cadena_select="SELECT * FROM institucion WHERE id_institucion='".$registro[0][12]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_institucion=$this->acceso_db->obtener_registro_db();

  	$this->cadena_select="SELECT * FROM especialidad WHERE id_especialidad='".$registro[0][14]."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro_especialidad=$this->acceso_db->obtener_registro_db();
	
?>
            <td valign="top" ><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                Nacido el <? echo $registro[0][6]; ?> de <? echo $registro[0][7]; ?> 
                de <? echo $registro[0][8]; ?> en <? echo $registro_ciudad[0][1]; ?>, 
                <? echo $registro_pais[0][1]; ?>.<br>
                <br>
                Es <? echo $registro[0][13]; ?> de <? echo $registro_institucion[0][1].".<br><br>"; ?> 
                Especializado en <? echo $registro_especialidad[0][1]; ?> </font></div></td>
            <td width="204" rowspan="2" bgcolor="#FFFFFF" > 
              <? if (($registro[0][5])!=""){?>
              <div align="center"> <img src="<? echo $registro[0][7];?>" width="200" height="200"> 
              </div>
              <? } ?>
            </td>
          </tr>
          <tr> 
            <td valign="top" > <div align="left"> 
                <p><br>
                  <font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Si 
                  desea contactarse con &eacute;l, puede escribirle a la siguiente 
                  direcci&oacute;n de correo electr&oacute;nico:</font><br>
                  <br><a href="mailto:<? echo $registro[0][17];?>" class="menuprincipal" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
                  <? echo $registro[0][17];?></p>
              </div>
              <div align="left"></div></td>
          </tr>
        </table>
      </td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
