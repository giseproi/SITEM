<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?	
		$correo=$_POST['correo_usuario'];
   mail($correo, "SITEM", "Hemos recibido su solicitud de Ingreso Al Sistema de informaci�n en telemedicina.
   Pronto le enviaremos un correo a esta misma direcci�n para darle a conocer su Nivel de acceso
   Cualquier duda, cont�ctenos a webmaster@sitem.udistrital.edu.co");
?>
</body>
</html>
