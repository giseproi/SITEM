<?
/*********************************************************************************************************************
  
								maf_controles.php 

Sistema De Información en Telemedicina
Universidad Distrital
Francisco José de Caldas
Copyright (C) 2010-2016 


Este programa es software libre; usted lo puede distribuir o modificar bajo los términos de la version 2 
de GNU - General Public License, tal como es publicada por la Free Software Foundation

Este programa se distribuye con la esperanza de que sea útil pero SIN NINGUNA GARANTÍA; 
sin garantía implícita de COMERCIALIZACIÓN  o de USO PARA UN PROPÒSITO EN PARTICULAR.

Por favor lea GNU General Public License para más detalles.

************************************************************************************************************************
* @subpackage   
* @package	db
* @copyright     GPL
* @version      	1.0
* @author      	Sistema de Información en Telemedicina - Universidad Distrital
* @link		http://sitem.udistrital.edu.co
* maf_controles Class 
*
* Esta clase de utiliza para armar la sección de código de los diferentes controles HTML; cada uno de
* ellos representados por un método con argumentos iguales al número de propiedades.
* 
*
*/

/**********************************************************************************************************************
*Atributos
*
*@access private
*@param  $servidor
*		URL del servidor de bases de datos. 

***********************************************************************************************************************
*/

/**********************************************************************************************************************
*@METHODS
*
*@access public
*
*@method maf_controles
*		 Constructor. Define los valores por defecto (TO DO)
*@method encabezado_tabla
*		 Crea la cadena HTML correspondiente al encabezado de la tabla del formulario
*@method cuadro_texto
*		 Crea la cadena HTML correspondiente a un control tipo cuadro de texto.
*@method cuadro_seleccion
*		 Crea la cadena HTML correspondiente a un control tipo checkbox.
*@method boton_radial
*		 Crea la cadena HTML correspondiente a un radiobutton.
*@method boton_submit
*		 Crea la cadena HTML correspondiente a un boton submit.
*@method cuadro_archivo
*		 Crea la cadena HTML correspondiente a un control de seleccion de archivo.
*@method boton_generico
*		 Crea la cadena HTML correspondiente a un boton.
*
***********************************************************************************************************************
*/
/*
 * @USAGE
**/
class maf_controles{

//to do: Implementar la funcionalidad para diferentes versiones de PHP


	/**
	 *@method formulario
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function formulario($propiedades){

if(array_key_exists('objetivo',$propiedades))
	{
		
		$target='target="'.$propiedades["objetivo"].'"';
		
		}else
		{
			
		  $target='';
		 }
		
	if(array_key_exists('encriptacion',$propiedades))
	{
		
		$enctype='enctype="'.$propiedades["encriptacion"].'"';
		
		}else
		{
			
		  $enctype='enctype= "text/plain"';
		 }

if(array_key_exists('metodo',$propiedades))
	{
		
		$method='method="'.$propiedades["metodo"].'"';
		
		}else
		{
			
		  $method='method="POST"';
		 }
if(array_key_exists('accion',$propiedades))
	{
		
		$action='action="'.$propiedades["accion"].'"';
		
		}else
		{
			
		  $action='action="index.html"';
		 }

if(array_key_exists('nombre',$propiedades))
	{
		
		$name='name="'.$propiedades["nombre"].'"';
		
		}else
		{
			
		  $name='name="formulario"';
		 }


$cadena_html="<form ".$target." ".$enctype." ".$method." ".$action." ".$name." >";
return $cadena_html;

}


	/**
	 *@method encabezado_tabla
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function encabezado_tabla($propiedades){
	
	if(array_key_exists('espacio_celdas',$propiedades))
	{
		
		$cellspacing='cellspacing="'.$propiedades["espacio_celdas"].'"';
		
		}else
		{
			
		  $cellspacing='cellspacing= "5"';
		 }
		
	if(array_key_exists('espacio_texto',$propiedades))
	{
		
		$cellpadding='cellpadding="'.$propiedades["espacio_texto"].'"';
		
		}else
		{
			
		  $cellpadding='cellpadding= "5"';
		 }
if(array_key_exists('ancho_tabla',$propiedades))
	{
		
		$width='width:'.$propiedades["ancho_tabla"].$propiedades["ancho_unidad"].';';
		
		}else
		{
			
		  $width='width: 60%;';
		 }
if(array_key_exists('borde_tabla',$propiedades))
	{
		
		$border='border="'.$propiedades["borde_tabla"].'"';
		
		}else
		{
			
		  $border='border="1"';
		 }

if(array_key_exists('alineacion_tabla',$propiedades))
	{
		
		$text_align='text-align:'.$propiedades["alineacion_tabla"].';';
		
		}else
		{
			
		  $text_align='text-align: left;';
		 }

$cadena_html="<table style=\"".$width." ".$text_align."\" ".$border." ".$cellpadding." ".$cellspacing.">\n<tbody>";
return $cadena_html;

}

	/**
	 *@method cuadro_texto
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function cuadro_texto($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
	if(array_key_exists('valor',$propiedades))
	{
		
		$value='value="'.$propiedades["valor"].'"';
		
		}else
		{
			
		  $value='';
		 }
	
	if(array_key_exists('habilitado',$propiedades))
	{
		
		$disabled='disabled="disabled"';
		
		}else
		{
			
		  $disabled='';
		 }
	
	
	if(array_key_exists('lectura',$propiedades))
	{
		$readonly='readonly="readonly"';
		}else{
			
			$readonly='';
  		 }
		
	if(array_key_exists('max_tamanno',$propiedades))
	{
		
		$maxlength='maxlength="'.$propiedades['max_tamanno'].'"';
		
		}else
		{
			
		  $maxlength='';
		 }
	
	if(array_key_exists('tamanno',$propiedades))
	{
		
		$size='size="'.$propiedades['tamanno'].'"';
		
		}else
		{
			
		  $size='';
		 }
	
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('nombre',$propiedades))
	{
		
		$name='name="'.$propiedades['nombre'].'"';
		
		}else
		{
			
		  $name='';
		 }
		
	if(array_key_exists('etiqueta',$propiedades))
	{
		
		$label=$propiedades['etiqueta'];
		
		}else
		{
			
		  $label='';
		 }	
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\">".$label."\n</td>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$readonly." ".$maxlength." ".$size." ".$tabindex." ".$name." ".$value.">\n</td>
</tr>";
		return $cadena_html;
}


	/**
	 *@method cuadro_clave 
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function cuadro_clave($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
	if(array_key_exists('valor',$propiedades))
	{
		
		$value='value="'.$propiedades["valor"].'"';
		
		}else
		{
			
		  $value='';
		 }
	
	if(array_key_exists('habilitado',$propiedades))
	{
		
		$disabled='disabled="disabled"';
		
		}else
		{
			
		  $disabled='';
		 }
	
	
	if(array_key_exists('lectura',$propiedades))
	{
		$readonly='readonly="readonly"';
		}else{
			
			$readonly='';
  		 }
		
	if(array_key_exists('max_tamanno',$propiedades))
	{
		
		$maxlength='maxlength="'.$propiedades['max_tamanno'].'"';
		
		}else
		{
			
		  $maxlength='';
		 }
	
	if(array_key_exists('tamanno',$propiedades))
	{
		
		$size='size="'.$propiedades['tamanno'].'"';
		
		}else
		{
			
		  $size='';
		 }
	
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('nombre',$propiedades))
	{
		
		$name='name="'.$propiedades['nombre'].'"';
		
		}else
		{
			
		  $name='';
		 }
		
	if(array_key_exists('etiqueta',$propiedades))
	{
		
		$label=$propiedades['etiqueta'];
		
		}else
		{
			
		  $label='';
		 }	
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\">".$label."\n</td>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$readonly." ".$maxlength." ".$size." ".$tabindex." ".$name." ".$value." type=\"password\">\n</td>
</tr>";
		return $cadena_html;
}


	/**
	 *@method cuadro_seleccion 
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function cuadro_seleccion($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
	if(array_key_exists('valor',$propiedades))
	{
		
		$value='value="'.$propiedades["valor"].'"';
		
		}else
		{
			
		  $value='';
		 }
	
	if(array_key_exists('habilitado',$propiedades))
	{
		
		$disabled='disabled="disabled"';
		
		}else
		{
			
		  $disabled='';
		 }
	
	
		
	if(array_key_exists('seleccionado',$propiedades))
	{
		
		$checked='maxlength="'.$propiedades['seleccionado'].'"';
		
		}else
		{
			
		  $checked='';
		 }
	
	
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('nombre',$propiedades))
	{
		
		$name='name="'.$propiedades['nombre'].'"';
		
		}else
		{
			
		  $name='';
		 }
		
	if(array_key_exists('etiqueta',$propiedades))
	{
		
		$label=$propiedades['etiqueta'];
		
		}else
		{
			
		  $label='';
		 }	
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\">".$label."\n</td>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$checked." ".$tabindex." ".$name." ".$value." type=\"checkbox\">\n</td>
</tr>";
//To Do: Implementar para poder poder el label delante o detrás del control
		return $cadena_html;
}

	/**
	 *@method boton_radial
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function boton_radial($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
	if(array_key_exists('valor',$propiedades))
	{
		
		$value='value="'.$propiedades["valor"].'"';
		
		}else
		{
			
		  $value='';
		 }
	
	if(array_key_exists('habilitado',$propiedades))
	{
		
		$disabled='disabled="disabled"';
		
		}else
		{
			
		  $disabled='';
		 }
	
	
		
	if(array_key_exists('seleccionado',$propiedades))
	{
		
		$checked='maxlength="'.$propiedades['seleccionado'].'"';
		
		}else
		{
			
		  $checked='';
		 }
	
	
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('grupo',$propiedades))
	{
		
		$grupo='name="'.$propiedades['grupo'].'"';
		
		}else
		{
			
		  $grupo='';
		 }
		
	if(array_key_exists('etiqueta',$propiedades))
	{
		
		$label=$propiedades['etiqueta'];
		
		}else
		{
			
		  $label='';
		 }	
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\">".$label."\n</td>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$checked." ".$tabindex." ".$grupo." ".$value." type=\"radio\">\n</td>
</tr>";
//To Do: Implementar para poder poder el label delante o detrás del control
		return $cadena_html;
}

	/**
	 *@method boton_submit
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function boton_submit($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
	if(array_key_exists('valor',$propiedades))
	{
		
		$value='value="'.$propiedades["valor"].'"';
		
		}else
		{
			
		  $value='';
		 }
	
		
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('name',$propiedades))
	{
		
		$name='name="'.$propiedades['name'].'"';
		
		}else
		{
			
		  $name='';
		 }
		
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$tabindex." ".$name." ".$value." type=\"submit\">\n</td>
</tr>";
//To Do: Implementar para poder poder el label delante o detrás del control
		return $cadena_html;
}


	/**
	 *@method cuadro_archivo
	 * @param array propiedades
	 * @return void
	 * @access public
	 */

function cuadro_archivo($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
		
	if(array_key_exists('habilitado',$propiedades))
	{
		
		$disabled='disabled="disabled"';
		
		}else
		{
			
		  $disabled='';
		 }
	
	
		
	if(array_key_exists('tipo_aceptado',$propiedades))
	{
		
		$accept='accept="'.$propiedades['tipo_aceptado'].'"';
		
		}else
		{
			
		  $accept='';
		 }
	
	
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('nombre',$propiedades))
	{
		
		$name='name="'.$propiedades['nombre'].'"';
		
		}else
		{
			
		  $name='';
		 }
		
	if(array_key_exists('etiqueta',$propiedades))
	{
		
		$label=$propiedades['etiqueta'];
		
		}else
		{
			
		  $label='';
		 }	
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\"><strong>".$label."</strong>\n</td>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$accept." ".$tabindex." ".$name." type=\"file\">\n</td>
</tr>";
		return $cadena_html;
}


	/**
	 *@method boton_generico
* @param array propiedades
	 * @return void
	 * @access public
	 */

function boton_generico($propiedades)
{
	
	//Verifica las propiedades especificadas y genera la cadena correspondiente:
	
	if(array_key_exists('valor',$propiedades))
	{
		
		$value='value="'.$propiedades["valor"].'"';
		
		}else
		{
			
		  $value='';
		 }
	
	if(array_key_exists('habilitado',$propiedades))
	{
		
		$disabled='disabled="disabled"';
		
		}else
		{
			
		  $disabled='';
		 }
	
	
		
	
	if(array_key_exists('posicion',$propiedades))
	{
		
		$tabindex='tabindex="'.$propiedades['posicion'].'"';
		
		}else
		{
			
		  $tabindex='';
		 }
		
	if(array_key_exists('nombre',$propiedades))
	{
		
		$name='name="'.$propiedades['nombre'].'"';
		
		}else
		{
			
		  $name='';
		 }
		
		$cadena_html="<tr>\n<td align=\"undefined\" valign=\"undefined\"><input ".$disabled." ".$tabindex." ".$nombre." ".$value." type=\"button\">\n</td>
</tr>";
		return $cadena_html;
}


}
?>