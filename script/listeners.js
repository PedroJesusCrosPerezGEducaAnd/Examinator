
// Listeners

// Inicializar web
document.body.addEventListener("load", inicializarWeb());


// ============================================================================
// ============================== IDENTIFICACIÓN ==============================
// ============================================================================
// Inputs
inputNombre.    addEventListener("change", validaInputNombre);
inputPassword.  addEventListener("change", validaInputPassword);
inputEmail.     addEventListener("change", validaInputEmail);
    // Bottom buttons
    // Siguiente
    btnIdentificacionSiguiente.addEventListener("click", validarFormularioIdentificacion);
    // Pasar de Identificación a Domicilio
    btnIdentificacionSiguiente.addEventListener("click", identificacion_domicilio);
    //btnIdentificacionSiguiente.addEventListener("click", siguienteFormulario2.bind(document.getElementById("identificacion")));


// ===========================================================================
// ================================ DOMICILIO ================================
// ===========================================================================
// Input and selects
inputDireccion. addEventListener("keyup", validaDireccion);
inputDireccion. addEventListener("keyup", rellenaProvincia);
slctProvincia.  addEventListener("change", validaHabilitarLocalidad);
slctProvincia.  addEventListener("change", rellenaLocalidad);
    // Bottom buttons
    // Anterior. Pasar de Domicilio a Identificación
    btnDomiAnterior.addEventListener("click", domicilio_identificacion);
    // Siguiente
    // Validar
    btnDomiSiguiente.addEventListener("click", validarFormularioDomicilio);




document.getElementById("direccion").addEventListener("keyup", rellenaProvincia);

// ===========================================================================
// ================================== OTROS ==================================
// ===========================================================================
// Inputs
inputDni.               addEventListener("change", validaDni);
inputTelefono.          addEventListener("change", validaTelefono);

// Pasar de Otros a Domicilio
//btnOtrosEnviar.addEventListener("click", validarFormularioOtros);
btnOtrosEnviar.addEventListener("click", validarFormularioOtros);
btnOtrosAnterior.addEventListener("click", otros_domicilio);


// TODO no funciona
btnOtrosEnviar.addEventListener("submit", function(event) {
    // Código a ejecutar cuando se envíe el formulario
    event.preventDefault(); // Para prevenir la acción por defecto del formulario
});