<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_operador) from operador";
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
<form action="024.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return(control_vacio(this,'nombre_operador')&& control_vacio(this,'nombre_sede_principal')&& control_vacio(this,'direccion_operador') && control_vacio(this,'pagina_web_operador') && control_vacio(this,'soporte'));" >
  <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
    <tr> 
      <td width="77%" valign="top"> 
        <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          Ingrese la informaci&oacute;n del Operador</strong></font> 
          <hr align="center" width="320">
        </div></td>
      <td width="23%" valign="bottom">&nbsp;</td>
    </tr>
    <tr> 
      <td rowspan="2" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr> 
            <td width="42%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">C&oacute;digo 
                Operador</font></font></div></td>
            <td width="58%"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="id_operador" value=" <? echo $maximo; ?> " readonly="readonly"size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Nombre 
                del Operador *</strong></font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="nombre_operador"size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Rese&ntilde;a 
                hist&oacute;rica</font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <textarea name="resena_operador"></textarea>
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Nombre 
                Sede Principal *</strong></font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="nombre_sede_principal"size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Direcci&oacute;n 
                Sede Principal *</strong></font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="direccion_operador"size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Direcci&oacute;n 
                en Internet *</strong></font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="pagina_web_operador"size="26">
              </font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">(http://...) 
              </font></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>Soporte 
                T&eacute;cnico
*</strong></font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="soporte"size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Logotipo 
                (100x100 pix)</font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="file" name="image" size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Foto 
                Sede Principal (200x200 pix)</font></font></div></td>
            <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="file" name="foto_operador" size="26">
              </font></strong></td>
          </tr>
          <tr> 
            <td height="62" colspan="2" align="center">
                <input type="submit" name="024" value="Enviar">
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong> 
                Los campos en <strong>Negrita</strong> son obligatorios</font></p></td>
          </tr>
        </table></td>
      <td width="23%" align="left" valign="top"><? include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/menu_lateral.php'); ?></td>
      </tr>
    </table>
</form>
