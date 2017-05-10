<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$this->cadena_select="SELECT max(id_equipo_medico) from equipo_medico";
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
<form name="form1" method="post" action="013.php" onSubmit="return(control_vacio(this,'nombre_equipo_medico') && control_vacio(this,'id_marca') && control_vacio(this,'modelo') && control_vacio(this,'tension_nominal') && control_vacio(this,'corriente') && control_vacio(this,'consumo_potencia') && control_vacio(this,'id_tecnologia') && control_vacio(this,'id_interfaz') && control_vacio(this,'id_clase_biomedica') && control_vacio(this,'detalle_equipo') && control_vacio(this,'detalle_instalacion'));" >
  <div align="center">
    <table width="720" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr> 
        <td width="77%" valign="top"> <div align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Ingrese 
            los datos del Equipo<br>
            </strong></font> 
            <hr align="center" width="320">
          </div></td>
        <td width="23%" valign="bottom">&nbsp;</td>
      </tr>
      <tr> 
        <td rowspan="2" valign="top"><table width="500" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr> 
              <td width="157"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo 
                  del equipo</font></div></td>
              <td width="243"><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="id_equipo_medico" value=" <? echo $maximo; ?> " readonly="readonly">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Nombre 
                  del equipo *</strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="nombre_equipo_medico">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Marca</font></div></td>
              <td> <strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_marca" >
                  <?
					$cadena = "SELECT * FROM marca";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_marca"];?>'> <? echo $registro["marca"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><font size="1">(Seleccione 
                uno)</font> </font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Modelo 
                  * </strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="modelo">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Tensi&oacute;n 
                  nominal (Voltios)*</strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="tension_nominal">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Corriente 
                  (Amperios)* </strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="corriente">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Consumo 
                  de potencia (Kw)*</strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="text" name="consumo_potencia">
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Tecnolog&iacute;a 
                  * </strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_tecnologia" >
                  <?
					$cadena = "SELECT * FROM tecnologia";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_tecnologia"];?>'> <? echo $registro["tecnologia"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><font size="1">(Seleccione 
                uno)</font> </font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Interfaz 
                  * </strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_interfaz" >
                  <?
					$cadena = "SELECT * FROM interfaz";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_interfaz"];?>'> <? echo $registro["interfaz"]; ?> 
                  </option>
                  <?
					 };
					 ?>
                </select>
                </font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><font size="1">(Seleccione 
                uno)</font> </font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Clasificaci&oacute;n 
                  Biom&eacute;dica *</strong></font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                <select name="id_clase_biomedica" >
                  <?
					$cadena = "SELECT * FROM clase_biomedica";
					$busqueda = mysql_query($cadena);
					for($i=0;$i<mysql_num_rows($busqueda);$i++)
					{
						$registro=mysql_fetch_array($busqueda);?>
                  <option value='<? echo $registro["id_clase_biomedica"];?>'> 
                  <? echo $registro["nombre_clase_biomedica"]; ?> </option>
                  <?
					 };
					 ?>
                </select>
                </font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><font size="1">(Seleccione 
                uno)</font> </font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                </font></strong></td>
            </tr>
            <tr> 
              <td><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Fotograf&iacute;a 
                  (200x200 pix)</font></div></td>
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                </font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"> 
                <input type="file" name="foto_equipo"size="26">
                </font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                </font></strong></td>
            </tr>
            <tr> 
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Detalles 
                del equipo *</font></strong></td>
              <td><textarea name="detalle_equipo"></textarea></td>
            </tr>
            <tr> 
              <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Detalles 
                de Instalaci&oacute;n *</font></strong></td>
              <td><textarea name="detalle_instalacion"></textarea></td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> <p><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
                  <input type="submit" name="013" value="Enviar">
                  </font></strong> </p>
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
