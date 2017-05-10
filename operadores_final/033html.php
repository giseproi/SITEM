<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_servicio_operador) from servicio_operador";
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

	$this->cadena_select_2="SELECT max(id_tarifa) from tarifa_operador";
	$this->acceso_db->registro_db($this->cadena_select_2,0);
	$conteo=$this->acceso_db->obtener_conteo_db();
		if ($conteo==0)
		{ 
			$maximo_2 = 0; // se asigna el número cero, caso contrario..
		} 
		else
		{
			$maximo_2=$this->acceso_db->obtener_registro_db();
			$maximo_2=$maximo_2[0][0];
			$maximo_2++;
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
<form name="form1" method="post" action="033.php" onSubmit="return(control_vacio(this,'precio_conexion')&& control_vacio(this,'cargo_mensual'));">
  <table width="720" border="0" align="center" cellspacing="0" cellpadding="8">
    <tr> 
      <td width="77%" valign="top"> 
        <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong><br>
          Tarifas de los Servicios de los Operadores</strong></font> 
          <hr align="center" width="320">
        </div></td>
      <td width="23%" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
        <td rowspan="2" valign="top"><table width="90%" border="0" align="center" cellspacing="4" cellpadding="0">
          <? if (isset($_POST['id_servicio_operador']))
		  {?>
          <tr> 
            <td width="40%"><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Nombre 
                del Servicio</font></font></div></td>
            <td width="60%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <strong> 
              <?
					$cadena = "SELECT * FROM servicio_operador WHERE id_servicio_operador='".$_POST['id_servicio_operador']."'";
					$busqueda = mysql_query($cadena);
					$registro=mysql_fetch_array($busqueda);
					echo $registro["nombre_servicio_operador"];?>
              <input type="hidden" name="id_servicio_operador" value=" <? echo $registro["id_servicio_operador"] ?> ">
              </strong></font></td>
          </tr>
          <? }
		  else
		  { ?>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif" color="#000033" size="2"><strong>Nombre 
                del Servicio *</strong></font></div></td>
            <td> <select name="id_servicio_operador" >
                <?
					$cadena = "SELECT * FROM servicio_operador";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                <option value='<? echo $registro["id_servicio_operador"];?>'> 
                <? echo $registro["nombre_servicio_operador"]; ?> </option>
                <?
					 };
					 ?>
              </select> </td>
          </tr>
          <?
				}
				?>
          <tr> 
            <td > <div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">C&oacute;digo 
                de la tarifa</font></font></div></td>
            <td ><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="text" name="id_tarifa" value=" <? echo $maximo_2; ?> " readonly="readonly">
              </font></td>
          </tr><tr> 
            <td > <div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Estrato</font></font></div></td>
            <td ><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="estrato" type="text" size="26">
              </font></td>
          </tr>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Precio 
                conexi&oacute;n *</strong></font></font></div></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="precio_conexion" type="text" size="26">
              </font></td>
          </tr>
          <tr> 
            <td > <div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2"><strong>Cargo 
                mensual *</strong></font></font></div></td>
            <td ><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cargo_mensual" type="text" size="26">
              </font></td>
          <tr> 
            <td><div align="left"><font face="Arial, Helvetica, sans-serif"><font color="#000033" size="2">Otros 
                Valores </font></font></div></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="otros_valores" type="text" size="26">
              </font></td>
          </tr>
          <tr> 
            <td colspan="2" align="center"> <p><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="submit" name="033" value="Enviar">
                </font></strong></p>
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
