<?
	$this->acceso_db=new db_admin;
	$this->enlace=$this->acceso_db->conectar_db();
	$code=$_GET['id'];
	$tabla=$_GET['tb'];
	$this->cadena_select="SELECT * FROM ".$tabla." WHERE id_".$tabla."='".$code."' ORDER BY id_".$tabla."";
	//echo $this->cadena_select;
	$this->acceso_db->registro_db($this->cadena_select,0);//ejecutar cadena
	$registro=$this->acceso_db->obtener_registro_db();
	$this->result = mysql_query($this->cadena_select);
 /* get column metadata */ 
?> <form name="form1" method="post" action="">
  <div align="center"><strong><font color="#000033" size="4" face="Arial, Helvetica, sans-serif"><? echo $tabla ?><br>
    <br>
    <input type="hidden" name="tabla" value="<? echo $tabla; ?>"><input type="hidden" name="id" value="<? echo $code; ?>">
    </font></strong> </div>
  <table align="center" width='500' border='1' cellspacing='4' cellpadding='2'>
  
<? 
$i = 0; 
while ($i < mysql_num_fields($this->result)) { 
   $meta = mysql_fetch_field($this->result); 
   echo "<tr><td>";
   if (!$meta) { 
       echo "No information available<br />\n"; 
   } 
echo "$meta->name </td>"; ?> 
  <td width="50%"><input type="text" name="<? echo $meta->name; ?>" value="<? echo $registro[0][$i]; ?>" size="15" >
  </tr><?  $i++; 
} 
?>  
</table>
  <? 
mysql_free_result($this->result); 
?>
  <div align="center"><br>
    <input type="submit" name="081" value="Actualizar">
  </div>
</form>
