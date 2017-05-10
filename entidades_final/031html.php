<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_especialidad) from especialidad";
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
<form name="form1" method="post" action="031.php" onSubmit="return(control_vacio(this,'especialidad') && control_vacio(this,'detalle_especialidad'));" >
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Especialidades<br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="392" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="187"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo 
                  de la Especialidad</font></div></td>
              <td width="193"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="id_especialidad" value=" <? echo $maximo; ?> " readonly="readonly" size="30">
                </font></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Nombre 
                  de la Especialidad *</strong></font></div></td>
              <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="especialidad"size="30">
                </font></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Detalles 
                  de la Especialidad *</strong></font></div></td>
              <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
                <textarea name="detalle_especialidad" ></textarea>
                </font></td>
            </tr>
            <tr> 
              <td height="40" colspan="2" align="center">
                <input type="submit" name="031" value="Enviar">
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
<div align="center"><strong></strong></div>
