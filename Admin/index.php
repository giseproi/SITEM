<?
$this->nivel=0;
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/cabecera.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/Admin/header_administrador.php');	
if(!isset($_POST['logon']))
{
?>
<script src="http://gemini.udistrital.edu.co/comunidad/grupos/sitem/incluir/funciones.js" type="text/javascript" language="javascript"></script>
<br><br><br><br><br><form method="post" action="http://gemini.udistrital.edu.co/comunidad/grupos/sitem/Admin/index.php" name="autenticacion" onsubmit="return ( control_vacio(this,'login') && control_vacio(this,'password'))">
<table border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: left; margin-left: auto; margin-right: auto; background-color: rgb(255, 255, 255); width: 350px; ">
    <tbody>
      <tr> 
        <td
style="vertical-align: top; background-color: rgb(221, 221, 221);"><span
style="font-weight: bold;"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Nombre 
          de Usuario:</strong></font></span> </td>
        <td style="background-color: rgb(221, 221, 221);"
align="undefined" valign="undefined"><input maxlength="20" size="20"
tabindex="1" name="login">
        </td>
      </tr>
      <tr> 
        <td style="background-color: rgb(238, 238, 238);"
align="undefined" valign="undefined"><span style="font-weight: bold;"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Clave:</strong></font></span><br> 
        </td>
        <td style="background-color: rgb(238, 238, 238);"
align="undefined" valign="undefined"><input maxlength="20" size="20"
tabindex="1" name="password" type="password"> </td>
      </tr>
      <tr align="center" bgcolor="#CCCCCC"> 
        <td colspan="2" rowspan="1" valign="undefined"> 
          <input name="logon"
value="Aceptar" type="submit">
        </td>
      </tr>
    </tbody>
  </table>
 </form>
<br><br><br><br><br><? 
}
else
{
////********************** verificar usuario


	
/**
Segundo: Se comprueba que el usuario y la clave existan en la base de datos

**/

$this->acceso_db=new db_admin;
$this->enlace=$this->acceso_db->conectar_db();
if (is_resource($this->enlace)){
		$this->cadena_sql='SELECT * FROM administrador WHERE login="'.$_POST['login'].'" AND password="'.md5($_POST['password']).'"';
		$this->acceso_db->registro_db($this->cadena_sql,0);
		$this->registro=$this->acceso_db->obtener_registro_db();
		$this->campos=count($this->registro);
		if($this->campos==0){
				?>
				<table border="0" align="center" cellpadding="2" cellspacing="2" style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;">
				  <tbody>
				<tr style="font-family: helvetica,arial,sans-serif;">
					  <td valign="top" style="vertical-align: top;">
				<div align="center"> <font color="#990000" size="2" face="Arial, Helvetica, sans-serif"><br>
						  El Nombre de Usuario o la Contrase&ntilde;a son err&oacute;neos.<br>
						  Reintente el ingreso al M&oacute;dulo de Administraci&oacute;n.<br>
						  </font> </div></font></font>
					  <p>&nbsp;</p></td>
				</tr>
				</table>
				
<?
				}else{
				?>
<div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong> 
  Bienvenido Al M&oacute;dulo de Administraci&oacute;n.</strong></font> </div>
<p align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">
  <link href="http://gemini.udistrital.edu.co/comunidad/grupos/sitem/incluir/style.css" rel="stylesheet" type="text/css">
  <strong><a href='080.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" > 
  <font size="3">Ingrese >></font></a></strong></font></p>
<?					
////********************
}
}
}
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/Admin/footer_sitem.php');
 ?>