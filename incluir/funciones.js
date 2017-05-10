

function control_vacio(formulario,control)
{
	
    var isEmpty  = 1;
    var campo = formulario.elements[control];
	    // Esto es si la función replace (js1.2) no es soportada
    var isRegExp = (typeof(campo.value.replace) != 'undefined');

    if (!isRegExp) {
        isEmpty      = (campo.value == '') ? 1 : 0;
    } else {
        var space_re = new RegExp('\\s+');
        isEmpty = (campo.value.replace(space_re, '') == '') ? 1 : 0;
    }
    if (isEmpty) {
        //formulario.reset();
        campo.select();
        alert('Todos los campos obligatorios deben ser diligenciados');
        campo.focus();
		document.resultado=false;
        return false;
    }
	document.resultado=false;
    return true;
} // Fin de la función control_vacio


