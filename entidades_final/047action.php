<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$servicio_medico = $_GET['essd'];
	$this->cadena_select="SELECT * FROM servicio_medico WHERE id_servicio_medico='".$servicio_medico."'";
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
	echo "<br><br>";
?>
<div align="center"> 
  <table width="720" border="0" align="center" cellpadding="1" cellspacing="4">
    <tr> 
      <td width="580" height="45" valign="top"> 
        <table width="500" border="0" align="center" cellpadding="0" cellspacing="4" class="table">
          <tr class="table"> 
            <td width="118" height="35" valign="top" class="table"> 
              <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro[0][1]; ?> </font></strong></div></td>
            <td width="355" valign="top" class="table"> 
              <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Detalles 
                del Servicio</strong><br>
                </font> &nbsp;<? echo $registro[0][2];?> </div>
              <div align="left"></div>
              </td>
          </tr>
        </table>
      </td>
      <td width="104" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br><br></div>
