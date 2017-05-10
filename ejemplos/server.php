<?
include_once('http://gemini.udistrital.edu.co/comunidad/grupos/sitem/incluir/header_registrese.php');	
?>
Para server <br>
<?
foreach($_SERVER as $key => $value){
	    echo "Key: $key; Value: $value<br>\n";

	}
?>

Para _ENV<br>

<?
foreach($_ENV as $key => $value){
	    echo "Key: $key; Value: $value<br>\n";

	}
?>