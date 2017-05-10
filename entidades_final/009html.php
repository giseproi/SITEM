<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_sede) from sede";
	$this->acceso_db->registro_db($this->cadena_select,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo==0)
		{ 
			$maximo = 0; // se asigna el número cero, caso contrario..
		} 
		else
		{
			$maximo=$this->acceso_db->obtener_registro_db();
			$maximo=$maximo[0][0];
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
<form name="form1" method="post" action="009.php" onSubmit="return(control_vacio(this,'nombre_sede')&& control_vacio(this,'id_institucion')&& control_vacio(this,'id_departamento') && control_vacio(this,'id_ciudad') && control_vacio(this,'direccion_sede') && control_vacio(this,'telefono_sede') && control_vacio(this,'correo_sede'));" >
  <div align="center"> 
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Sedes 
            <br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="176"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">C&oacute;digo 
                  de la sede</font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="id_sede" value=" <? echo $maximo; ?> " readonly="readonly">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Nombre 
                  de la sede *</strong></font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="nombre_sede">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Nombre 
                  de la instituci&oacute;n *</strong></font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
                  <font size="1">(Seleccione uno)</font> </font></div></td>
            </tr>
            <tr> 
              <td rowspan="3"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Ubicaci&oacute;n 
                  de la Sede *</strong></font></font></div></td>
              <td width="132"> <p align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Departamento/Estado 
                  </font></font></p></td>
              <td width="212"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
                  <font size="1">(Seleccione uno)</font> </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Ciudad 
                  </font></font></div></td>
              <td width="212"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
                  <font size="1">(Seleccione uno)</font> </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Localidad 
                  </font></font></div></td>
              <td width="212"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_localidad">
                    <?
					$cadena = "SELECT * FROM localidad ORDER BY id_localidad";
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
                  <font size="1">(Seleccione uno)</font> </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Direcci&oacute;n 
                  de la Sede *</strong></font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="direccion_sede">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>PBX/Tel&eacute;fono 
                  * </strong></font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="telefono_sede">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Correo 
                  Electr&oacute;nico
*</strong></font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input name="correo_sede" type="text" onBlur="MM_validateForm('correo_sede','','NisEmail');return document.MM_returnValue">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">&Aacute;rea</font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="area">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">N&uacute;mero 
                  de edificios</font></font></div></td>
              <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="edificios">
                  </font></div></td>
            </tr>
            <tr> 
              <td colspan="3" align="center">
                  <input type="submit" name="009" value="Enviar">
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong> 
                Los campos en <strong>Negrita</strong> son obligatorios</font></p></td>
            </tr>
          </table></td>
        <td width="23%" align="left" valign="top">
          <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
        </td>
      </tr>
    </table>
</div>
</form>
<div align="center">
</div>
