<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_usuario) from usuario";
	$this->cadena_select_2="SELECT max(id_usuario) from medico";
	$this->acceso_db->registro_db($this->cadena_select,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
	$maximo=$this->acceso_db->obtener_registro_db();
	$maximo=$maximo[0][0];
	$this->acceso_db->registro_db($this->cadena_select_2,0);
	$conteo_2=$this->acceso_db->obtener_conteo_db();
		if ($conteo==0)
		{ 
			$maximo = 0; // se asigna el número cero, caso contrario..
		} 
		else
		{
			$maximo2=$this->acceso_db->obtener_registro_db();
			$maximo2=$maximo2[0][0];
			if($maximo2>$maximo)
			{
			$maximo=$maximo2;
			}
			$maximo++;
		}

?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' Debe contener una dirección de correo electrónico.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('Ha ocurrido el siguiente error:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<form name="form1" method="post" action="001.php" onSubmit="return(control_vacio(this,'nombre_usuario')&& control_vacio(this,'apellido_usuario')&& control_vacio(this,'numero_id') && control_vacio(this,'direccion_contacto') && control_vacio(this,'telefono_usuario') && control_vacio(this,'correo_usuario')&& control_vacio(this,'login')&& control_vacio(this,'password')&& control_vacio(this,'conf_password'));" >
  <table width="720" border="0" cellspacing="0" cellpadding="8">
    <tr>
<td width="77%" valign="top">
	    <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          Ingrese la informaci&oacute;n de Usuario</strong></font> 
          <hr align="center" width="320">
        </div></td>      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="580" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr> 
            <td width="35%"><div align="right"></div></td>
            <td colspan="2" ><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="hidden" name="id_usuario" value=" <? echo $maximo; ?> ">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Nombres 
                *</font></strong></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="nombre_usuario">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Apellidos 
                *</font></strong></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="apellido_usuario">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>N&uacute;mero 
                de Identificaci&oacute;n *</strong></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="numero_id">
              </font></strong></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><font size="1">(C&eacute;dula 
              de Ciudadan&iacute;a, C&eacute;dula de Extranjer&iacute;a, Pasaporte 
              sin puntos o guiones) </font></font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">G&eacute;nero</font></div></td>
            <td colspan="2"> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="genero">
                <option selected value="0">Masculino 
                <option value="1">Femenino 
              </select>
              <font size="1">(Seleccione uno)</font> </font></strong></td>
          </tr>
          <tr> 
            <td rowspan="4" valign="top">
<div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Localizaci&oacute;n</font></div></td>
            <td width="25%"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Pa&iacute;s 
                </font></div></td>
            <td width="40%"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="id_pais" >
                <?
					$cadena = "SELECT * FROM pais";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                <option value='<? echo $registro["id_pais"];?>'> <? echo $registro["nombre_pais"]; ?> 
                </option>
                <?
					 };
					 ?>
              </select>
              <font size="1">(Seleccione uno)</font> </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Departamento/Estado 
                </font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="id_departamento">
                <?
					$cadena = "SELECT * FROM departamento";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                <option value='<? echo $registro["id_departamento"];?>'> <? echo $registro["nombre_departamento"]; ?> 
                </option>
                <?
					 };
					 ?>
              </select>
              <font size="1">(Seleccione uno)</font> </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Ciudad 
                </font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="id_ciudad">
                <?
					$cadena = "SELECT * FROM ciudad";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                <option value='<? echo $registro["id_ciudad"];?>'> <? echo $registro["nombre_ciudad"]; ?> 
                </option>
                <?
					 };
					 ?>
              </select>
              <font size="1">(Seleccione uno)</font> </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Localidad 
                </font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="id_localidad">
                <?
					$cadena = "SELECT * FROM localidad";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                <option value='<? echo $registro["id_localidad"];?>'> <? echo $registro["nombre_localidad"]; ?> 
                </option>
                <?
					 };
					 ?>
              </select>
              <font size="1">(Seleccione uno)</font> </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Instituci&oacute;n</font></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="id_institucion">
                <?
					$cadena = "SELECT * FROM institucion";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                <option value='<? echo $registro["id_institucion"];?>'> <? echo $registro["nombre_institucion"]; ?> 
                </option>
                <?
					 };
					 ?>
              </select>
              <font size="1">(Seleccione uno)</font> </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Cargo</font></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="cargo">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Direcci&oacute;n 
                de contacto *</strong></font></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="direccion_contacto">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Tel&eacute;fono 
                * </strong></font></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="telefono_usuario">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Correo 
                electr&oacute;nico
*</strong></font></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="correo_usuario" type="text" >
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Nombre 
                de Usuario *</font></strong></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="login" type="text" >
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contrase&ntilde;a 
                * </font></strong></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="password" name="password" >
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Confirmar 
                contrase&ntilde;a *</font></strong></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="password" name="conf_password" >
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Tipo 
                de Acceso Solicitado</font></div></td>
            <td colspan="2"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="tipo_acceso">
              </font></strong></td>
          </tr>
          <tr> 
            <td colspan="3" align="center"> <p> 
                <input type="submit" name="001" value="Enviar">
              </p>
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong> 
                Los campos en <strong>Negrita</strong> son obligatorios</font></p></td>
          </tr>
        </table></td>
      <td align="left" valign="top"> 
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
        <div align="left"></div>
        <div align="left"></div></td>
    </tr>
  </table>
  </form>
