// FORMULARIOS
var v_identificacion = document.getElementById("identificacion");
var v_domicilio = document.getElementById("domicilio");
var v_otros = document.getElementById("otros");

var v_inputError = document.getElementsByClassName("inputError"); // errores de input
var v_topButton = document.getElementsByClassName("topButton");

// Botones superiores
var btnIdentificacion = document.getElementById("btnIdentificacion");
var btnDomicilio = document.getElementById("btnDomicilio");
var btnOtros = document.getElementById("btnOtros");
// Texto título (h2) superior
var h2Titulo = document.getElementById('h2Titulo');
var h2Identificacion    = "Identificación";
var h2Domicilio         = "Domicilio";
var h2Otros             = "Otros";

// ============================================================================
// ============================== IDENTIFICACIÓN ==============================
// ============================================================================
// Inputs campos
var inputNombre = document.forms["identificacion"]["nombre"];
var inputPassword = document.forms["identificacion"]["password"];
var inputEmail = document.forms["identificacion"]["email"];

// Inputs values | mediante ruta, sin id
function getNombre()        {   return document.forms["identificacion"]["nombre"].value;    }
function setNombre(texto)   {   document.getElementById("nombre").value = texto;            }
function getPassword()      {   return document.forms["identificacion"]["password"].value;  }
function setPassword(texto) {   document.getElementById("password").value = texto;          }
function getEmail()         {   return document.forms["identificacion"]["email"].value;     }
function setEmail(texto)    {   document.getElementById("email").value = texto;             }

// Labels error
var v_nombreError = document.getElementById("nombreError"); // ERROR nombre
var v_passwordError = document.getElementById("passwordError"); // ERROR contraseña
var v_emailError = document.getElementById("emailError"); // ERROR email

    // Cambiar mensaje error
    var msgError_nombreError_1 = "Este campo es obligatorio";
    var msgError_nombreError_2 = "Este campo no admite números";
    
    var msgError_passwordError_1 = "Este campo es obligatorio";
    var msgError_passwordError_2 = "Debe tener al  menos  una  longitud  de  8  caracteres  donde  exista  al  menos  una  mayúscula,  una  minúscula  y  un número";
   
    var msgError_emailError_1 = "Este campo es obligatorio";
    var msgError_emailError_2 = "Debe tener una estructura parecida: example@domain.es";

// Estados
var estadoInputNombre = false;
var estadoInputPassword = false;
var estadoInputEmail = false;
var estadoFormulario = false;

// Botón
var btnIdentificacionSiguiente = document.getElementById("ideSiguiente");


// ===========================================================================
// ================================ DOMICILIO ================================
// ===========================================================================
// Input y selects
var inputDireccion = document.getElementById("direccion");
var slctProvincia = document.getElementById("slctProvincia");
var slctLocalidad = document.getElementById("slctLocalidad");

// Selects values | utilizando id
function getDireccion() { return document.getElementById("direccion").value                 }
function setDireccion(texto)    {   document.getElementById("direccion").value = texto;     }
function getPronvicia() { return document.getElementById("slctProvincia").value;            }
function getLocalidad() { return document.getElementById("slctProvincia").value;            }
// Labels error
var v_direccionError = document.getElementById("direccionError");
var v_provinciaError = document.getElementById("provinciaError");
var v_localidadError = document.getElementById("localidadError");

    // Cambiar mensajes error
    var msgError_direccionError = "Este campo es obligatorio";

    var msgError_provinciaError_1 = "Este campo es obligatorio";
    var msgError_provinciaError_1 = "Este campo es obligatorio";

    var msgError_localidadError_1 = "Este campo es obligatorio";
    var msgError_localidadError_1 = "Este campo es obligatorio";

// Estados
var estadoInputDireccion = false;
var estadoSlctProvincia = false;
var estadoSlctLocalidad = false;
var estadoFormularioDomicilio = false;

// Botones
var btnDomiAnterior = document.getElementById("btnDomiAnterior");
var btnDomiSiguiente = document.getElementById("btnDomiSiguiente");

// ===========================================================================
// ================================== OTROS ==================================
// ===========================================================================
// Inputs, radio buttons y checkboxes
var inputfechaNacimiento =  document.getElementById("fecha_nacimiento");
var inputDni =              document.getElementById("dni");
var inputTelefono =         document.getElementById("telefono");

var inputSexo =             document.getElementById("grpRBSexo");
var inputRadioFemenino =    document.getElementById("inputRadioFemenino");
var inputRadioMasculino =   document.getElementById("inputRadioMasculino");

var inputIntereses =        document.getElementById("grpCBIntereses");
var inputCheckBoxCine =     document.getElementById("cine");
var inputCheckBoxMusica =   document.getElementById("musica");
var inputCheckBoxLectura =  document.getElementById("lectura");

// Inputs values
function getFechaNacimiento()       {   return document.getElementById("fecha_nacimiento").value;   }
function setFechaNacimiento(texto)  {   document.getElementById("fecha_nacimiento").value = texto;  }

function getDni()                   {   return document.getElementById("dni").value;        }
function setDni(texto)              {   document.getElementById("dni").value = texto;       }
function getTelefono()              {   return document.getElementById("telefono").value;   }
function setTelefono(texto)         {   document.getElementById("telefono").value = texto;  }

function getRBFemenino()            {   return document.getElementById("inputRadioFemenino").checked;            }
function setRBFemenino(estado)      {   return document.getElementById("inputRadioFemenino").checked = estado;   }
function getRBMasculino()           {   return document.getElementById("inputRadioMasculino").checked;           }
function setRBMasculino(estado)     {   return document.getElementById("inputRadioMasculino").checked = estado;  }

function getCBCine()                {   return document.getElementById("cine").checked;             }
function setCBCine(estado)          {   return document.getElementById("cine").checked = estado;    }
function getCBMusica()              {   return document.getElementById("musica").checked;           }
function setCBMusica(estado)        {   return document.getElementById("musica").checked = estado;  }
function getCBLectura()             {   return document.getElementById("lectura").checked;          }
function setCBLectura(estado)       {   return document.getElementById("lectura").checked = estado; }

// Labels error
var v_fechaNacimientoError =    document.getElementById("fecha_nacimientoError");
var v_dniError =                document.getElementById("dniError");
var v_telefonoError =           document.getElementById("telefonoError");
var v_sexoError =               document.getElementById("sexoError");
var v_interesesError =          document.getElementById("interesesError");

    // Cambiar mensajes error
    var msgError_fechaNacimientoError_1 =   "Este campo es obligatorio";
    var msgError_fechaNacimientoError_2 =   "El formato introducido es inválido. Formato correcto: 'DD/MM/AAAA'";
    var msgError_fechaNacimientoError_3 =   "La fecha introducida no es lógica";

    var msgError_dniError =                 "El dni introducido no es correcto";

    var msgError_telefonoError_1 =          "Debe tener una estructura parecida a esta #########, empezando por 6";
    var msgError_telefonoError_2 =          "Debe empezar por: '6, 7 o 9'";

    var msgError_sexoError =                "Este campo es obligatorio";

// Estados
var estadoInputFechaNacimiento = false;
var estadoInputDni = false;
var estadoInputTelefono = false;

var estadoInputSexo = false;

var estadoInputCBCine = false;
var estadoInputCBMusica = false;
var estadoInputCBLectura = false;

var estadoFormularioOtros = false;

// Botones
var btnOtrosAnterior = document.getElementById("btnOtrosAnterior");
var btnOtrosEnviar = document.getElementById("btnOtrosEnviar");


// Resultados finales
var nombre = "";
var password = "";
var email = "";
var direccion = "";
var pronvicia = "";
var localidad = "";
var fecha_nacimiento = "";
var dni = "";
var telefono = "";//      telefono = telefono.replace(/[\s-]+/g, '');
var sexo = "";
var interesesCine = false;
var interesesMusica = false;
var interesesLectura = false;

