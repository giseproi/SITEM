<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_institucion) from institucion";
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
<form name="form1" method="post" action="006.php" onSubmit="return(control_vacio(this,'nombre_institucion') && control_vacio(this,'nombre_director') && control_vacio(this,'apellido_director') && control_vacio(this,'direccion_institucion') && control_vacio(this,'id_pais') && control_vacio(this,'id_departamento') && control_vacio(this,'id_ciudad') && control_vacio(this,'telefono_institucion') && control_vacio(this,'correo_institucion')&& control_vacio(this,'id_clase_institucion'));" >
  <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
    <tr> 
      <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Ingrese 
          los datos de la Entidad<br>
          </strong></font> 
          <hr align="center" width="320">
        </div></td>
      <td width="23%" valign="bottom">&nbsp;</td>
    </tr>
    <tr> 
      <td rowspan="2" valign="top"><table width="580" border="0" align="center" cellspacing="4" cellpadding="0">
          <tr> 
            <td width="214"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">C&oacute;digo 
                de la instituci&oacute;n</font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="id_institucion" value=" <? echo $maximo; ?> " readonly="readonly"size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Nombre 
                de la instituci&oacute;n *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="nombre_institucion" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Fotograf&iacute;a 
                (200x200 pix)</font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="file" name="foto_institucion" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Nombres 
                del Director *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="nombre_director" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Apellidos 
                del Director *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="apellido_director" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Direcci&oacute;n 
                Sede Principal *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="direccion_institucion" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td rowspan="4"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Ubicaci&oacute;n 
                *</strong></font></font></div></td>
            <td width="136"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Pa&iacute;s 
                &nbsp; </font></font></div></td>
            <td width="214"> <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_pais">
                  <?
					$cadena = "SELECT * FROM pais order by id_pais";
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
                <font size="1">(Seleccione uno)</font> </font></div></td>
          </tr>
          <tr> 
            <td> <p align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Departamento/Estado&nbsp;</font></font></p></td>
            <td width="214"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
                &nbsp;</font></font></div></td>
            <td width="214"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
                &nbsp;</font></font></div></td>
            <td width="214"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
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
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>PBX 
                / Tel&eacute;fono *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="telefono_institucion" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Direcci&oacute;n 
                en Internet</font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="pagina_web" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Correo 
                electr&oacute;nico
*</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="correo_institucion" type="text" onBlur="MM_validateForm('correo_institucion','','NisEmail');return document.MM_returnValue" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Clase 
                de Instituci&oacute;n *</strong></font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_clase_institucion">
                  <?
					$cadena = "SELECT * FROM clase_institucion";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_clase_institucion"];?>'> 
                  <? echo $registro["clase_institucion"]; ?> </option>
                  <?
					 };
					 ?>
                </select>
                <font size="1">(Seleccione uno)</font> </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Nivel 
                de atenci&oacute;n</font></font></div></td>
            <td colspan="2"> <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="nivel">
                  <option selected value="0"> 
                  <option value="1">Nivel 1 
                  <option value="2">Nivel 2 
                  <option value="3">Nivel 3 
                  <option value="4">Nivel 4 
                </select>
                <font size="1">(Seleccione uno)</font> </font></div></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Nit</font></font></div></td>
            <td colspan="2"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="nit" size="26">
                </font></div></td>
          </tr>
          <tr> 
            <td colspan="3" align="center"> <input type="submit" name="006" value="Enviar"> 
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong> 
                Los campos en <strong>Negrita</strong> son obligatorios</font></p></td>
          </tr>
        </table></td>
      <td width="23%" align="left" valign="top">
        <? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?>
      </td>
    </tr>
  </table>
</form>
