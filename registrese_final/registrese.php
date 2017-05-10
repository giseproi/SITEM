<?
$this->nivel=0;
include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/cabecera.php');	
?><HTML>
<HEAD>
<TITLE>registrese final</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<!-- Script (registrese final) -->
<SCRIPT LANGUAGE="JavaScript">
<!--

function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}

function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}
	}
}

var preloadFlag = false;
function preloadImages() {
	if (document.images) {
		registrese_05_ImageMap_01_over = newImage("images/registrese_05-ImageMap_01_o.gif");
		registrese_05_ImageMap_02_over = newImage("images/registrese_05-ImageMap_02_o.gif");
		registrese_08_ImageMap_02_over = newImage("images/registrese_08-ImageMap_02_o.gif");
		registrese_08_ImageMap_03_over = newImage("images/registrese_08-ImageMap_03_o.gif");
		registrese_08_ImageMap_04_over = newImage("images/registrese_08-ImageMap_04_o.gif");
		registrese_09_ImageMap_04_over = newImage("images/registrese_09-ImageMap_04_o.gif");
		registrese_09_ImageMap_06_over = newImage("images/registrese_09-ImageMap_06_o.gif");
		registrese_09_ImageMap_05_over = newImage("images/registrese_09-ImageMap_05_o.gif");
		preloadFlag = true;
	}
}

// -->
</SCRIPT>
<!-- End Preload Script -->

</HEAD>
<BODY BGCOLOR=#FFFFFF leftmargin="0" topmargin="0" ONLOAD="preloadImages();">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td> 
      <!--  (registrese final) -->
      <TABLE WIDTH=800 BORDER=0 CELLPADDING=0 CELLSPACING=0>
        <TR> 
          <TD COLSPAN=3> <table width="800" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="269"><IMG NAME="Index_01" SRC="images/Index_01.gif" WIDTH=269 HEIGHT=119 BORDER=0 USEMAP="#Index_01_Map"> 
                  <MAP NAME="Index_01_Map">
                    <AREA SHAPE="rect" ALT="" COORDS="164,84,236,104" HREF="registrese.php"
	ONMOUSEOVER="changeImages('Index_01', 'images/Index_01-ImageMap_02_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_01', 'images/Index_01.gif'); return true;">
                    <AREA SHAPE="rect" ALT="" COORDS="74,84,126,104" HREF="../index.html"
	ONMOUSEOVER="changeImages('Index_01', 'images/Index_01-ImageMap_01_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_01', 'images/Index_01.gif'); return true;">
                  </MAP></td>
                <td width="304"><IMG NAME="Index_02" SRC="images/Index_02.gif" WIDTH=264 HEIGHT=119 BORDER=0 USEMAP="#Index_02_Map"> 
                  <MAP NAME="Index_02_Map">
                    <AREA SHAPE="rect" ALT="" COORDS="205,84,264,104" HREF="../foros_final/foros.html"
	ONMOUSEOVER="changeImages('Index_02', 'images/Index_02-ImageMap_05_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_02', 'images/Index_02.gif'); return true;">
                    <AREA SHAPE="rect" ALT="" COORDS="98,84,164,104" HREF="../noticias_final/noticias.html"
	ONMOUSEOVER="changeImages('Index_02', 'images/Index_02-ImageMap_04_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_02', 'images/Index_02.gif'); return true;">
                    <AREA SHAPE="rect" ALT="" COORDS="0,84,61,104" HREF="../chat_final/chat.html"
	ONMOUSEOVER="changeImages('Index_02', 'images/Index_02-ImageMap_03_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_02', 'images/Index_02.gif'); return true;">
                  </MAP></td>
                <td width="227"><IMG NAME="Index_03" SRC="images/Index_03.gif" WIDTH=267 HEIGHT=119 BORDER=0 USEMAP="#Index_03_Map"> 
                  <MAP NAME="Index_03_Map">
                    <AREA SHAPE="rect" ALT="" COORDS="141,84,200,104" HREF="#"
	ONMOUSEOVER="changeImages('Index_03', 'images/Index_03-ImageMap_07_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_03', 'images/Index_03.gif'); return true;">
                    <AREA SHAPE="rect" ALT="" COORDS="34,84,104,104" HREF="../seminarios_final/seminarios.html"
	ONMOUSEOVER="changeImages('Index_03', 'images/Index_03-ImageMap_06_over.gif'); return true;"
	ONMOUSEOUT="changeImages('Index_03', 'images/Index_03.gif'); return true;">
                  </MAP></td>
              </tr>
            </table></TD>
        </TR>
        <TR> 
          <TD> <IMG SRC="images/registrese_02.gif" WIDTH=295 HEIGHT=57></TD>
          <TD> <IMG SRC="images/registrese_03.gif" WIDTH=385 HEIGHT=57></TD>
          <TD> <IMG SRC="images/registrese_04.gif" WIDTH=120 HEIGHT=57></TD>
        </TR>
        <TR> 
          <TD> <IMG NAME="registrese_05" SRC="images/registrese_05.gif" WIDTH=295 HEIGHT=119 BORDER=0 USEMAP="#registrese_05_Map"></TD>
          <TD ROWSPAN=3 align="center" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><!-- TemplateBeginEditable name="contenido" --> 
                  <div align="right"> 
                    <p><font color="#000066" size="4">..............................</font></p>
                    <p align="justify"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><br>
<?
if(!isset($_POST["000"])){
?>		
		                    <p align="justify"><font color="#000066" size="4" face="Arial, Helvetica, sans-serif">A</font><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">cceda 
                      a los servicios y bondades que ofrece el Sistema de Informaci&oacute;n 
                      en Telemedicina ingresando su Nombre de Usuario y Contrase&ntilde;a...</font></p>
<?
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/000html.php');
?>	
                      </font><font color="#000066" size="4" face="Arial, Helvetica, sans-serif">S</font><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">i 
                      a&uacute;n no dispone de un Nombre de Usuario, Reg&iacute;strese 
                      llenando el siguiente formulario.</font></p>
                    </div>
                    <p align="right"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">
                      <link href="http://gemini.udistrital.edu.co/comunidad/grupos/sitem/incluir/style.css" rel="stylesheet" type="text/css">
                    <strong><a href='001.php'class="unnamed1" onMouseOver="this.style.color='#0033CC';" onMouseOut="this.style.color='#000033';" >
					Reg&iacute;strese >></a></strong></font></p>

<?

}else
	{
		include_once($_SERVER['DOCUMENT_ROOT'].'/sitem/incluir/000action.php');	
		}
?>
                  <!-- TemplateEndEditable --></td>
              </tr>
            </table></TD>
          <TD ROWSPAN=3> <IMG SRC="images/registrese_07.gif" WIDTH=120 HEIGHT=389></TD>
        </TR>
        <TR> 
          <TD> <IMG NAME="registrese_08" SRC="images/registrese_08.gif" WIDTH=295 HEIGHT=119 BORDER=0 USEMAP="#registrese_08_Map"></TD>
        </TR>
        <TR> 
          <TD> <IMG NAME="registrese_09" SRC="images/registrese_09.gif" WIDTH=295 HEIGHT=151 BORDER=0 USEMAP="#registrese_09_Map"></TD>
        </TR>
        <TR> 
          <TD COLSPAN=3> <IMG SRC="images/registrese_10.gif" WIDTH=800 HEIGHT=35></TD>
        </TR>
      </TABLE>
      <p> 
        <MAP NAME="registrese_05_Map">
          <AREA SHAPE="rect" ALT="" COORDS="34,85,175,119" HREF="../entidades_final/entidades.php"
	ONMOUSEOVER="changeImages('registrese_05', 'images/registrese_05-ImageMap_02_o.gif', 'registrese_08', 'images/registrese_08-ImageMap_02_o.gif'); return true;"
	ONMOUSEOUT="changeImages('registrese_05', 'images/registrese_05.gif', 'registrese_08', 'images/registrese_08.gif'); return true;">
          <AREA SHAPE="rect" ALT="" COORDS="34,28,181,73" HREF="../operadores_final/operadores.php"
	ONMOUSEOVER="changeImages('registrese_05', 'images/registrese_05-ImageMap_01_o.gif'); return true;"
	ONMOUSEOUT="changeImages('registrese_05', 'images/registrese_05.gif'); return true;">
        </MAP>
        <MAP NAME="registrese_08_Map">
          <AREA SHAPE="rect" ALT="" COORDS="34,74,147,119" HREF="../organizaciones_final/organizaciones.html"
	ONMOUSEOVER="changeImages('registrese_08', 'images/registrese_08-ImageMap_04_o.gif', 'registrese_09', 'images/registrese_09-ImageMap_04_o.gif'); return true;"
	ONMOUSEOUT="changeImages('registrese_08', 'images/registrese_08.gif', 'registrese_09', 'images/registrese_09.gif'); return true;">
          <AREA SHAPE="rect" ALT="" COORDS="34,11,147,56" HREF="../tecnologias_final/tecnologias.php"
	ONMOUSEOVER="changeImages('registrese_08', 'images/registrese_08-ImageMap_03_o.gif'); return true;"
	ONMOUSEOUT="changeImages('registrese_08', 'images/registrese_08.gif'); return true;">
        </MAP>
        <MAP NAME="registrese_09_Map">
          <AREA SHAPE="rect" ALT="" COORDS="34,74,130,119" HREF="../equipos_final/equipos.php"
	ONMOUSEOVER="changeImages('registrese_09', 'images/registrese_09-ImageMap_06_o.gif'); return true;"
	ONMOUSEOUT="changeImages('registrese_09', 'images/registrese_09.gif'); return true;">
          <AREA SHAPE="rect" ALT="" COORDS="34,17,130,57" HREF="../servicios_final/servicios.html"
	ONMOUSEOVER="changeImages('registrese_09', 'images/registrese_09-ImageMap_05_o.gif'); return true;"
	ONMOUSEOUT="changeImages('registrese_09', 'images/registrese_09.gif'); return true;">
        </MAP>
        <!-- End  -->
      </p>
      <div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</BODY>
</HTML>