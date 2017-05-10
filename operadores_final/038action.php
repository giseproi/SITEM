<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$tarifa_operador = $_GET['opst'];
	$this->cadena_select_2="SELECT * FROM tarifa_operador WHERE id_servicio_operador='".$tarifa_operador."'";
	$this->acceso_db->registro_db($this->cadena_select_2,0);//ejecutar cadena
	$conteo=$this->acceso_db->obtener_conteo_db(); // obtener numero de registros en la db
	$registro=$this->acceso_db->obtener_registro_db();
	$this->cadena_select_1="SELECT * FROM servicio_operador WHERE id_servicio_operador='".$tarifa_operador."'";
	$this->acceso_db->registro_db($this->cadena_select_1,0);//ejecutar cadena
	$registro_1=$this->acceso_db->obtener_registro_db();
?>
<div align="left"><br>
  <br>
  <table width="720" border="0" align="center" cellpadding="1" cellspacing="4">
    <tr>
      <td width="580" valign="top"> 
        <div align="center"> <? echo "<font face='Arial, Helvetica, sans-serif' color='#000033' size='2'>Estos son las Tarifas del servicio <strong>".$registro_1[0][2]."
		</strong> que se encuentran registradas en el Sistema.<br><br></font>";?> 
          <table width="580" border="0" cellspacing="4" cellpadding="0" class="table">
            <tr valign="top" class="table"> 
              <td rowspan="4" class="table"> <div align="center"><strong><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"> 
                <? echo $registro_1[0][2]; ?> </font></strong></div></td>
              <td class="table"> 
                <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Estrato</strong> 
                  <br>
                  </font>&nbsp;<? echo $registro[0][2]; ?></div></td>
            </tr>
            <tr> 
              <td class="table"> 
                <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Precio 
                  de la Conexi&oacute;n</strong><br>
                  </font>&nbsp;<? echo $registro[0][3]; ?></div></td>
            </tr>
            <tr> 
              <td class="table"> 
                <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Cargo 
                  Mensual </strong><br>
                  </font>&nbsp;<? echo $registro[0][4]; ?></div></td>
            </tr>
            <tr> 
              <td class="table"> 
                <div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>Otros 
                  Valores </strong><br>
                  </font>&nbsp;<? echo $registro[0][5]; ?></div></td>
            </tr>
          </table>
        </div></td>
      <td width="124" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
<br><br></div>
