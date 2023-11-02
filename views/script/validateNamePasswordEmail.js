// VALIDATOR

// VALIDA NOMBRE
function validaInputNombre() 
{
    var nombre = getNombre();
    estadoInputNombre = nombre == "" || nombre.length == 0 || !isNaN(nombre);

    // Validar que el campo nombre no esté vacío ni contenga números
    if ( !estadoInputNombre ) 
    {
        ocultarMensajeError(v_nombreError, inputNombre);
        estadoInputNombre = true;
    } 
    else 
    {
        if ( nombre == "" || nombre.length == 0 )
            v_nombreError.textContent = msgError_nombreError_1;
        else
            v_nombreError.textContent = msgError_nombreError_2;

        mostrarMensajeError(v_nombreError, inputNombre);
        estadoInputNombre = false;
    }
}

// VALIDA PASSWORD
function validaInputPassword() 
{
    var password = document.forms["identificacion"]["password"].value;
    var expresionRegularPassword  = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

    // Validar password para debe tener al  menos  una  longitud  de  8  caracteres  donde  exista  al  menos  una  mayúscula,  una  minúscula  y  un número
    if ( expresionRegularPassword.test(password) ) 
    {
        ocultarMensajeError(v_passwordError, inputPassword);
        estadoInputPassword = true;
    }
    else
    {
        if ( password == "" )
            v_passwordError.textContent = msgError_passwordError_1;
        else
            v_passwordError.textContent = msgError_passwordError_2;

        mostrarMensajeError(v_passwordError, inputPassword);
        estadoInputPassword = false;
    }
}

// VALIDA EMAIL
function validaInputEmail() 
{
    var email = document.forms["identificacion"]["email"].value;
    var expresionRegularEmail = /\S+@\S+\.\S+/;
    
    if ( expresionRegularEmail.test(email) ) 
    {
        ocultarMensajeError(v_emailError, inputEmail);
        estadoInputEmail = true;
    } 
    else 
    {
        if ( email == "" )
            v_emailError.textContent = msgError_emailError_1;
        else
            v_emailError.textContent = msgError_emailError_2;

        mostrarMensajeError(v_emailError, inputEmail);
        estadoInputEmail = false;
    }
}

// VALIDAR FORMULARIO COMPLETO
function validarFormularioIdentificacion() 
{
    estadoFormulario = estadoInputNombre && estadoInputEmail && estadoInputEmail;

    if ( estadoFormulario ) {
        nombre =    getNombre();
        password =  getPassword();
        email =     getEmail();
    } 
    else 
    {
        if ( !estadoInputNombre )
            mostrarMensajeError(v_nombreError, inputNombre);
        
        if ( !estadoInputPassword )
            mostrarMensajeError(v_passwordError, inputPassword);
        
        if ( !estadoInputEmail )
            mostrarMensajeError(v_emailError, inputEmail);
    }


}
