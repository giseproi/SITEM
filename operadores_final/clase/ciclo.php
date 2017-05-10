<?
if(!isset($contador))
{
$contador=1;
}
	$cuenta = 0; // formualrio para mostrar los cuadros de texto donde se escriben las propiedades del control
    while ($muestra)
	{ //este ciclo se realiza para colocar un color de fondo a cada uno de los cuadros de las propiedades del control
        if ($cuenta == 1)
		{ // para colocar color gris claro
            $c = "c";
            $d = "e";
            $cuenta = 0;
        } 
		else
		{ // para colocar color gris oscuro
                $c = "e";
                $d = "c";
                $cuenta++;
        } 
		$cambios = $espacio->variable($muestra['id_propiedad']); // cambia el nombre de la variable de números a letras para colocar el nombre del campo con letras
		$cambios2 = $espacio->variable($contador);
		echo"
		<table bgcolor='#" . $c . $c . $c . $c . $c . $c . "' width='390' border='0' cellspacing='1' cellpadding='0'>
			<tr>
				<td width='180'>" . $muestra['nombre_dato'] . "</td>
				<td width='210'><input type='text' size='30' maxlength='30' name='" . $cambios2.$cambios. "'></td>
			</tr>
		</table>"; //crea cada uno de los cuadros de texto con el nombre de la propiedad para ingresar los datos
        $muestra = mysql_fetch_array($informe);
	} 
    echo "
	<table bgcolor='#" . $d . $d . $d . $d . $d . $d . "' width='390' border='0' cellspacing='1' cellpadding='0'>
		<tr>
			<td width='180'>N&uacute;mero del formulario</td> 
			<td width='210'>" . $numform . "</td>
			</tr>
		</table>";
	// muestra el número del formulario al que corresponde el control creado
    echo "
	<table bgcolor='#" . $c . $c . $c . $c . $c. $c . "' width='390' border='0' cellspacing='1' cellpadding='0'>
		<tr>
			<td width='180'>Ubicaci&oacute;n del control</td> 
			<td width='210'>" . $maximo_control . "</td>
			</tr>
		</table>";
	// muestra el número del formulario al que corresponde el control creado

?>