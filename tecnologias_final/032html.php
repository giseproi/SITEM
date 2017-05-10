<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_tecnologia_conexion) from tecnologia_conexion";
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
<form name="form1" method="post" action="032.php" onSubmit="return(control_vacio(this,'nombre_tecnologia_conexion')&& control_vacio(this,'descripcion_tecnologia')&& control_vacio(this,'velocidad_transmision') && control_vacio(this,'metodo_senalizacion') && control_vacio(this,'id_medio_transmision') && control_vacio(this,'longitud_maxima') && control_vacio(this,'id_protocolo'));">
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><br><strong>Ingrese 
            la informaci&oacute;n de la Tecnolog&iacute;a<br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="173"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">C&oacute;digo 
                  de la Tecnolog&iacute;a </font></font></div></td>
              <td width="180"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="id_tecnologia_conexion" value=" <? echo $maximo; ?> " readonly="readonly"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Nombre 
                  de la Tecnolog&iacute;a *</strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="nombre_tecnologia_conexion"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td valign="top"> <div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong><br>
                  Descripci&oacute;n de la Tecnolog&iacute;a *</strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <textarea name="descripcion_tecnologia"></textarea>
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Velocidad 
                  de Transmisi&oacute;n *</strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="velocidad_transmision"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>M&eacute;todo 
                  de Se&ntilde;alizaci&oacute;n *</strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="metodo_senalizacion"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td height="24">
<div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Medio 
                  de Transmisi&oacute;n *</strong></font></font></div></td>
              <td valign="middle"> 
                <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_medio_transmision" >
                    <?
					$cadena = "SELECT * FROM medio_transmision";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                    <option value='<? echo $registro["id_medio_transmision"];?>'> 
                    <? echo $registro["nombre_medio_transmision"]; ?> </option>
                    <?
					 };
					 ?>
                  </select>
                  <font size="1">(Seleccione uno)</font></font></div></td>
            </tr>
            <tr> 
              <td><div align="left" class ><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Longitud 
                  M&aacute;xima del Medio *</strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="text" name="longitud_maxima"size="26">
                  </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Topolog&iacute;a 
                  * </strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_topologia" >
                    <?
					$cadena = "SELECT * FROM clase_topologia";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                    <option value='<? echo $registro["id_topologia"];?>'> <? echo $registro["nombre_topologia"]; ?> 
                    </option>
                    <?
					 };
					 ?>
                  </select>
                  <font size="1">(Seleccione uno)</font> </font></div></td>
            </tr>
            <tr> 
              <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Protocolo 
                  * </strong></font></font></div></td>
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <select name="id_protocolo" >
                    <?
					$cadena = "SELECT * FROM protocolo";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                    <option value='<? echo $registro["id_protocolo"];?>'> <? echo $registro["nombre_protocolo"]; ?> 
                    </option>
                    <?
					 };
					 ?>
                  </select>
                  <font size="1">(Seleccione uno)</font> </font></div></td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> <p align="center"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"> 
                  <br>
                  <input type="submit" name="032" value="Enviar">
                  </font></font></p>
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
