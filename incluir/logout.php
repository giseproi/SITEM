
<?
$this->nivel=0;
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/cabecera.php');	
$this->acceso_db=new db_admin;
$this->enlace=$this->acceso_db->conectar_db();
if (is_resource($this->enlace)){
	$this->sesion=new sesiones;
	$this->sesion->especificar_enlace($this->enlace);
	$this->sesion_id= md5($this->sesion->usuario_ip().$_SERVER["HTTP_USER_AGENT"]);
//echo $this->sesion_id;
	$this->sesion->especificar_sesion($this->sesion_id);
	$this->cerrar_sesion=$this->sesion->terminar_sesion();
	if($this->cerrar_sesion)
	{
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/formulario/header_sitem.php');	
?>			
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="720" border="0" align="center" cellpadding="2" cellspacing="2" >
  <tbody>
    <tr style="font-family: helvetica,arial,sans-serif;"> 
      <td width="380" style="vertical-align: top;"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Muchas 
          Gracias </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"></span> 
          </font> <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
          <br>
          Acaba de abandonar el sitio con seguridad. Si lo desea, puede navegar 
          como un Usuario General o volver al m&oacute;dulo de Autenticaci&oacute;n 
          de usuarios para reingresar al Portal del Sistema de Informaci&oacute;n 
          en Telemedicina.<br>
          Cualquier duda o comentario por favor comun&iacute;quelo a:<br>
          sitem@udistrital.edu.co</font></div></td>
      <td width="106" style="vertical-align: top;">
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
</table>
<?
echo "<br><br><br><br><br><br><br>";
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/formulario/footer_registrese.php');
		}}
?>

