//TODO tengo que pasar todo esto a una clase

// URL Api's
var urlActual = window.location.href;
var urlBase = urlActual.split('?')[0];

let PHPapiUsersRequests = urlBase+"api/apiuser.php?user=findByRole&role=null";
let PHPapiUsersRoleNotnull = urlBase+"api/apiuser.php?user=findByRole&role=notnull";
let PHPapiUser = urlBase+"api/apiuser.php";
let PHPapiGenerateExam = urlBase+"api/apiGenerateExam.php";
let PHPapiValidateLogin = urlBase+"api/apiValidateLogin.php";
let PHPapiValidateSignup = urlBase+"api/apiValidateSignup.php";


// Feedback messages
let feedbackLoginForm = {
    "true" : "Te has logeado correctamente",
    "false" : "Las credenciales son incorrectas",
    "error" : "Se ha producido un error en el servidor: "
}
let feedbackSignupForm = {
    "true" : "Te has registrado correctamente",
    "false" : "Los campos introducidos son incorrectos",
    "error" : "Se ha producido un error en el servidor: "
}

class Configfile 
{

    // ###################################################################################################
    // ########################################### FEEDBACK ##############################################
    // ###################################################################################################
    static getFeedbackLoginForm()
    {
        return feedbackLoginForm = 
        {
            "true" : "Te has logeado correctamente",
            "false" : "Las credenciales son incorrectas",
            "error" : "Se ha producido un error en el servidor: "
        }
    }


    static getFeedbackSignupForm()
    {
        return feedbackSignupForm =
        {
            "true" : "Te has registrado correctamente",
            "false" : "Los campos introducidos son incorrectos",
            "error" : "Se ha producido un error en el servidor: "
        }
    }


    // ###################################################################################################
    // ############################################## API'S ##############################################
    // ###################################################################################################
    static apiEntity($entity, $option, field=null, value=null)
    {
        var apiroute = (field === null && value === null) ? 
        "http://localexaminator/api/api"+$entity+".php?"+$entity+"="+$option+"&"+field+"="+value
        :
        "http://localexaminator/api/api"+$entity+".php?"+$entity+"="+$option

        return apiroute;
    }

    static apiExam()
    {
        return "api/apiExam.php";
    }

    static apiLogin()
    {
        return "api/apiLogin.php";
    }

    static apiSignup()
    {
        return "api/apiSignup.php";
    }
}