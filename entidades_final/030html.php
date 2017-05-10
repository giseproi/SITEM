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
			$maximo = 0; // se asigna el n�mero cero, caso contrario..
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
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' Debe contener una direcci�n de correo electr�nico.\n';
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
<form action="030.php" method="post" name="form1" onSubmit="return(control_vacio(this,'nombre_medico') && control_vacio(this,'apellido_medico') && control_vacio(this,'numero_id') && control_vacio(this,'dia') && control_vacio(this,'mes') && control_vacio(this,'anno') && control_vacio(this,'id_institucion') && control_vacio(this,'cargo') && control_vacio(this,'especialidad') && control_vacio(this,'direccion_contacto_medico') && control_vacio(this,'telefono_medico') && control_vacio(this,'correo_medico')&& control_vacio(this,'login')&& control_vacio(this,'password')&& control_vacio(this,'conf_password'));" >
  <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
    <tr> 
      <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Hoja 
          de Vida de los Especialistas en Salud <br>
          </strong></font> 
          <hr align="center" width="320">
        </div></td>
      <td width="23%" valign="bottom">&nbsp;</td>
    </tr>
    <tr> 
      <td rowspan="2" valign="top"><table width="580" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr> 
            <td width="31%"><div align="left"></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="hidden" name="id_usuario" value=" <? echo $maximo; ?> ">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Nombres 
                * </strong></font></font></div></td>
            <td colspan="2"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="text" name="nombre_medico"size="26">
                </font></font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Apellidos 
                * </strong></font></font></div></td>
            <td colspan="2"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="text" name="apellido_medico"size="26">
                </font></font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>N&uacute;mero 
                de Identificaci&oacute;n *</strong></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="numero_id" size="26">
              </font></strong></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><font size="1">(C&eacute;dula 
              de Ciudadan&iacute;a, C&eacute;dula de Extranjer&iacute;a, Pasaporte 
              sin puntos o guiones) </font></font></strong></td>
          </tr>
          <tr> 
            <td height="24"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">G&eacute;nero</font></font></div></td>
            <td colspan="2"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <select name="genero">
                  <option selected value="0">Masculino 
                  <option value="1">Femenino 
                </select>
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                </font></font></div></td>
          </tr>
          <tr> 
            <td height="25"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Fotograf&iacute;a 
                (200x200 pix) </font></font></div></td>
            <td colspan="2"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="file" name="foto_medico"size="26">
                </font></font></div></td>
          </tr>
          <tr> 
            <td height="88"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Fecha 
                de Nacimiento *</strong></font></font></div></td>
            <td colspan="2" valign="top" > <div align="left"> 
                <table width="134%" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                      D&iacute;a</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                      </font></font></font></td>
                    <td width="92%"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                      <select name="dia">
                        <?
for($dia=1;$dia<32;$dia++)
	{?>
                        <option value="<? echo $dia ?>"><? echo $dia;?> 
                        <?}?>
                      </select>
                      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                      <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                      </font></font></font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                      Mes</font></font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                      <select name="mes">
                        <option value="Enero">Enero 
                        <option value="Febrero">Febrero 
                        <option value="Marzo">Marzo 
                        <option value="Abril">Abril 
                        <option value="Mayo">Mayo 
                        <option value="Junio">Junio 
                        <option value="Julio">Julio 
                        <option value="Agosto">Agosto 
                        <option value="Septiembre">Septiembre 
                        <option value="Octubre">Octubre 
                        <option value="Noviembre">Noviembre 
                        <option value="Diciembre">Diciembre 
                      </select>
                      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                      <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                      </font></font></td>
                  </tr>
                  <tr> 
                    <td height="24"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">A&ntilde;o 
                      </font><font color="#000033"> </font></font></td>
                    <td height="24"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                      <select name="anno">
                        <?
for($anno=1930;$anno<2010;$anno++)
	{?>
                        <option value="<? echo $anno ?>"><? echo $anno;?> 
                        <? } ?>
                      </select>
                      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                      <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                      </font></font></td>
                  </tr>
                </table>
              </div></td>
          </tr>
          <tr> 
            <td rowspan="3"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Lugar 
                de Nacimiento</font></font></div></td>
            <td width="26%" rowspan=""><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Pa&iacute;s 
                </font></font></div></td>
            <td width="43%" rowspan=""><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <select name="id_pais">
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
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Departamento/Estado 
                </font></font></div></td>
            <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
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
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Ciudad 
                </font></font></div></td>
            <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
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
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Instituci&oacute;n 
                * </strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
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
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Cargo 
                * </strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="text" name="cargo"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Especialidad 
                * </strong></font></font></div></td>
            <td colspan="2"> <div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <select name="especialidad">
                  <?
					$cadena = "SELECT * FROM especialidad";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_especialidad"];?>'> <? echo $registro["especialidad"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <font size="1">(Seleccione uno)</font> </font><font color="#000033"> 
                </font></font></strong></div></td>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Direcci&oacute;n 
                de contacto *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="text" name="direccion_contacto_medico"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td height="24"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Tel&eacute;fono 
                * </strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="text" name="telefono_medico"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Correo 
                electr&oacute;nico
*</strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input name="correo_medico" type="text" onBlur="MM_validateForm('correo_medico','','NisEmail');MM_validateForm('correo_medico','','NisEmail');return document.MM_returnValue" size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td height="23">
<div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Nombre 
                de Usuario *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input name="login" type="text"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Contrase&ntilde;a 
                * </strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="password" name="password"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Confrimar 
                contrase&ntilde;a *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="password" name="conf_password"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Tipo 
                de Acceso Solicitado</font></font></div></td>
            <td colspan="2"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="text" name="tipo_acceso"size="26">
                </font></font></strong></div></td>
          </tr>
          <tr> 
            <td colspan="3" align="center"><p> 
                <input type="submit" name="030" value="Enviar">
              </p>
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong> 
                Los campos en <strong>Negrita</strong> son obligatorios</font></p></td>
          </tr>
          <tr> 
            <td colspan="3" align="center">&nbsp;</td>
          </tr>
        </table></td>
      <td width="23%" align="left" valign="top">
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
</form>
