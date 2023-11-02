
// Inicializo web

function inicializarWeb() {
    // Seleccionar primer botón superior
    topButtonBackgroundColor(); // Coloreo botones superiores de [ Domicilio | Otros ] 

    btnIdentificacion.classList.add('btnSeleccionado');
    // Identificación
    v_nombreError.textContent =     msgError_nombreError_1;
    v_passwordError.textContent =   msgError_passwordError_2;
    v_emailError.textContent =      msgError_emailError_1;

    // Domicilio
    slctProvincia.classList.add('deshabilitar');
    slctLocalidad.classList.add('deshabilitar');
    v_direccionError.textContent = msgError_direccionError;
    v_provinciaError.textContent = msgError_provinciaError_1;
    v_localidadError.textContent = msgError_localidadError_1;

    // Otros
    v_fechaNacimientoError.textContent =    msgError_fechaNacimientoError_1;
    v_dniError.textContent =                msgError_dniError;
    v_telefonoError.textContent =           msgError_telefonoError_1;
    v_sexoError.textContent =               msgError_sexoError;

    ocultarErrores(); // Inicializo errores visibility a false
    v_domicilio.classList.add('eliminar');
    v_otros.classList.add('eliminar');
    aplicarFeedback(false);

    
}



// ===========================================================================
// ============================== IDENTIFICACIÓN =============================
// ===========================================================================

// SIGUIENTE - Pasar de Identificación a Domicilio
function identificacion_domicilio() {
    if (estadoFormulario) {
        v_identificacion.classList.add('eliminar');
        v_domicilio.classList.remove('eliminar');
        //estadoFormulario = false;
        
        h2Titulo.innerHTML = h2Domicilio;
        siguienteBoton(btnIdentificacion, btnDomicilio);
    }
}


// ============================================================================
// ================================= DOMICILIO ================================
// ============================================================================
// SIGUIENTE - Pasar de Domicilio a Otros
function domicilio_otros() {
    if (estadoFormulario) {
        v_domicilio.classList.add('eliminar');
        v_otros.classList.remove('eliminar');
        estadoFormulario = false;

        h2Titulo.innerHTML = h2Otros;
        siguienteBoton(btnDomicilio, btnOtros);
    }
}

// ANTERIOR - Pasar de Domicilio a Identificación
function domicilio_identificacion() {
    v_domicilio.classList.add('eliminar');
    v_identificacion.classList.remove('eliminar');

    h2Titulo.innerHTML = h2Identificacion;
    siguienteBoton(btnDomicilio, btnIdentificacion);
}


// =============================================================================
// =================================== OTROS ===================================
// =============================================================================
// ANTERIOR - Pasar de Otros a Domicilio
function otros_domicilio() {
    v_otros.classList.add('eliminar');
    v_domicilio.classList.remove('eliminar');

    h2Titulo.innerHTML = h2Domicilio;
    siguienteBoton(btnOtros, btnDomicilio);
}
function otros_identificacion() {
    v_otros.classList.add('eliminar');
    v_identificacion.classList.remove('eliminar');

    h2Titulo.innerHTML = h2Identificacion;
    siguienteBoton(btnOtros, btnIdentificacion);
}



// =============================================================================
// ================================== METHODS ==================================
// =============================================================================
function topButtonBackgroundColor() {
    for (let i = 1; i < v_topButton.length; i++) {
        v_topButton[i].classList.add('btnDeseleccionado');
    }
}

function ocultarErrores() {
    for (let i = 0; i < v_inputError.length; i++) {
        v_inputError[i].classList.add('oculto');
    }
}

function siguienteBoton(actual, siguiente) {
    deseleccionarBoton(actual);
    seleccionarBoton(siguiente);
    /*actual.classList.remove('btnSeleccionado');
    actual.classList.add('btnDeseleccionado');
    siguiente.classList.remove('btnDeseleccionado');
    siguiente.classList.add('btnSeleccionado');*/
}
function deseleccionarBoton(boton) {
    boton.classList.remove('btnSeleccionado');
    boton.classList.add('btnDeseleccionado');
}
function seleccionarBoton(boton) {
    boton.classList.remove('btnDeseleccionado');
    boton.classList.add('btnSeleccionado');
}
function mostrarMensajeError(mensaje, input) {
    mensaje.classList.remove('oculto'); // Mostrar el mensaje de error
    input.classList.add('error'); // Mostrar borde rojo
}
function ocultarMensajeError(mensaje, input) {
    mensaje.classList.add('oculto'); // Ocultar el mensaje de error
    input.classList.remove('error'); // Ocultar borde rojo
}


function resetearFormulario()
{
    aplicarFeedback(false);
    otros_identificacion();
    limpiar();
    //setTimeout( aplicarFeedback(true), 3000 );
    aplicarFeedback(true);
    aplicarFeedbackRetardo(3000);
    //prueba();
}
function aplicarFeedback(estado)
{
    if ( estado )
    document.getElementById('feedback').classList.remove('eliminar');
    else
    document.getElementById('feedback').classList.add('eliminar');
}

function aplicarFeedbackRetardo(time)
{
    setTimeout( aplicarFeedback, time );
}

function limpiar()
{
    setNombre("");
    setPassword("");
    setEmail("");
    setDireccion("");
    if ( getFechaNacimiento() != "" )
        setFechaNacimiento("");
    if ( getDni() != "" )
        setDni("");
    if ( getTelefono() != "" )
        setTelefono("");
    if ( getRBFemenino() == true )
        setRBFemenino(false);
    if ( getRBMasculino() == true )
        setRBMasculino(false);
    if ( getCBCine() == true )
        setCBCine(false);
    if ( getCBMusica() == true )
        setCBMusica(false);
    if ( getCBLectura() == true )
        setCBLectura(false);
}
