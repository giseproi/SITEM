<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$medio = $_GET['mt'];
	$this->cadena_select_2="SELECT * FROM medio_transmision WHERE id_medio_transmision='".$medio."'";
	$this->acceso_db->registro_db($this->cadena_select_2,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
	echo "<br><br>";
?>
<div align="center"> 
  <table width="700" border="0" cellspacing="4" cellpadding="1">
    <tr> 
      <td width="580" height="45" valign="top"> 
        <table width="580" border="0" cellpadding="0" cellspacing="4" class="table">
          <tr class="table"> 
            <td width="118" valign="top" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; ?> </font></strong></div>
            <td class="table"> <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Detalle 
                del Medio de Transmisi&oacute;n</strong><br>
                </font> &nbsp;<? echo $registro[0][2];?> </div>
              <div align="left"></div></td>
          </tr>
        </table></td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
