
// VALIDATOR

// Valida fecha de nacimiento
function validaFechaNacimiento() 
{
    // VARIABLES
        var fecha = getFechaNacimiento();    
        // Validar que la fecha tenga el formato correcto (dd/mm/yyyy)
        var regexFecha = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
        // Obtener día, mes y año de la fecha
        var partesFecha = fecha.split("/");
        var dia = parseInt(partesFecha[0], 10);
        var mes = parseInt(partesFecha[1], 10);
        var anio = parseInt(partesFecha[2], 10);
        // variable. Validar que la fecha sea válida
        var fechaValida = new Date(anio, mes - 1, dia);
        // variable. Fecha actual
        var fechaActual = new Date();

    // CONCICIONES
        if ( fecha == "" ) 
        {
            estadoInputFechaNacimiento = true;
        }
        else
        {
            if ( !regexFecha.test(fecha) || isNaN(fechaValida) ) 
            {
                v_fechaNacimientoError.textContent = msgError_fechaNacimientoError_2;
                estadoInputFechaNacimiento = false;
            } 
            else 
            {
                if ( fechaValida >= fechaActual )
                {
                    v_fechaNacimientoError.textContent = msgError_fechaNacimientoError_3;
                    estadoInputFechaNacimiento = false;
                } 
                else 
                {
                    estadoInputFechaNacimiento = true;
                }
            }
        }
    
    // CONCLUSIÓN
        if ( estadoInputFechaNacimiento )
            ocultarMensajeError(v_fechaNacimientoError, inputfechaNacimiento);
        else
            mostrarMensajeError(v_fechaNacimientoError, inputfechaNacimiento);
}
  

// Valida dni
function validaDni() 
{
    // Variables
    var dni = getDni();
    var numero, letra, letraCorrecta;
    var expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

    // Operaciones
    numero = dni.substr(0, dni.length - 1);
    letra = dni.substr(dni.length - 1, 1);
    numero = numero % 23;
    letraCorrecta = 'TRWAGMYFPDXBNJZSQVHLCKET';
    letraCorrecta = letraCorrecta.substring(numero, numero + 1);

    // Condiciones
    if ( dni == "" ) {
        ocultarMensajeError(v_dniError, inputDni);
        estadoInputDni = true;
    } 
    else 
    {
        if ( expresion_regular_dni.test(dni) && letraCorrecta == letra.toUpperCase() ) 
        {
            ocultarMensajeError(v_dniError, inputDni);
            estadoInputDni = true;
        } 
        else 
        {
            v_dniError.textContent = msgError_dniError;
            mostrarMensajeError(v_dniError, inputDni);
            estadoInputDni = false;
        }
    }

}
  

// Valida teléfono
function validaTelefono() 
{
    // VARIABLES
        var telefono = getTelefono();
        // Trim. Eliminar espacios y guiones
        telefono = telefono.replace(/[\s-]+/g, '');

    // CONDICIONES
        if ( telefono == "" ) 
        {
            estadoInputTelefono = true;
        } 
        else 
        {
            // Verificar que el número tiene 9 dígitos
            if (!/^\d{9}$/.test(telefono)) 
            {
                v_telefonoError.textContent = msgError_telefonoError_1;
                estadoInputTelefono = false;
            }
            else
            {
                // Verificar que el número empieza por 6, 7 o 9
                if (!/^[679]/.test(telefono)) 
                {
                    v_telefonoError.textContent = msgError_telefonoError_2;
                    estadoInputTelefono = false;
                }
                else
                {
                    estadoInputTelefono = true;
                }
            }
        }    
    
    // CONCLUSIÓN
        if ( estadoInputTelefono ) {
            ocultarMensajeError( v_telefonoError, inputTelefono );
        } else {
            mostrarMensajeError( v_telefonoError, inputTelefono );
        }
}
  

// Valida sexo
function validaSexo()
{
    var sexoF = getRBFemenino();
    
    if ( sexoF )
        sexo = "F";
    else
        sexo = "M";
}

// Valida intereses
function validaIntereses()
{
    interesesCine = getCBCine();
    interesesMusica = getCBMusica();
    interesesLectura = getCBLectura();
}

function validarFormularioOtros()
{
    validaFechaNacimiento();
    validaDni();
    validaTelefono();
    validaSexo();
    validaIntereses();

    estadoFormulario = estadoInputFechaNacimiento && estadoInputDni && estadoInputTelefono;

    if ( estadoFormulario ) 
    {
        
        // Formulario relleno:
        console.log("=========================================================");
        console.log("============= El formulario está correcto!! =============");
        console.log("=========================================================");
        enviar();
    }

    setTimeout( resetearFormulario, 1200 ); 
}


function enviar()
{
    btnOtrosEnviar.textContent = "Enviando . . .";

    nombre = getNombre();
    password = getPassword();
    email = getEmail();
    direccion = getDireccion();
    pronvicia = getPronvicia();
    localidad = getLocalidad();
    fecha_nacimiento = getFechaNacimiento();
    dni = getDni();
    telefono = getTelefono();
    sexo = "";
    //interesesCine
    //interesesMusica
    //interesesLectura

    // Ficha final, formulario rellenado
    console.log("");
    console.log("");
    console.log("**************************");
    console.log("******* Resultados *******");
    console.log("**************************");
    console.log("");
    console.log(" - Nombre: " + nombre);
    console.log(" - Password: " + password);
    console.log(" - Email: " + email);
    console.log(" - Dirección: " + direccion);
    console.log(" - Provincia: " + pronvicia);
    console.log(" - Localidad: " + localidad);
    console.log(" - Fecha de nacimiento: " + fecha_nacimiento);
    console.log(" - DNI: " + dni);
    console.log(" - Teléfono: " + telefono);
    console.log(" - Cine: "+ interesesCine);
    console.log(" - Música: "+ interesesMusica);
    console.log(" - Lectura: " + interesesLectura);

    //validarFormularioOtros();
}
