
// VALIDATOR

// Valida dirección
function validaDireccion() 
{
    var direccion = getDireccion();

    if ( !direccion == "" ) 
    {
        ocultarMensajeError(v_passwordError, inputPassword);
        estadoInputDireccion = true;
    } 
    else 
    {
        mostrarMensajeError(v_passwordError, inputPassword);
        estadoInputDireccion = false;
    }

    validaHabilitarProvincia()
}

// Valida habilitar provincia
function validaHabilitarProvincia()
{
    if ( estadoInputDireccion )
    {
        slctProvincia.classList.remove('deshabilitar'); // Habilito Select de Provincia
        estadoSlctProvincia = true;
    }
    else
    {
        slctProvincia.classList.add('deshabilitar'); // Habilito Select de Provincia
        estadoSlctProvincia = false;
    }
}

// Valida habilitar localidad
function validaHabilitarLocalidad()
{
    rellenaLocalidad();

    slctLocalidad.classList.remove('deshabilitar'); // Habilito Select de Provincia
    estadoSlctLocalidad = true;
}
function provinciaElegida()
{
    estadoSlctLocalidad = true;
    return getPronvicia();
}

function validarFormularioDomicilio() 
{
    if ( estadoInputDireccion ) 
    {
        ocultarMensajeError(v_direccionError, inputDireccion);
        domicilio_otros();
    } 
    else 
    {
        v_direccionError.textContent = msgError_direccionError;
        mostrarMensajeError(v_direccionError, inputDireccion);
    }
}
