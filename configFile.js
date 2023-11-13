//TODO tengo que pasar todo esto a una clase

// Api's
let PHPapiGenerateExam = "api/apiGenerateExam.php";
let PHPapiValidateLogin = "api/apiValidateLogin.php";
let PHPapiValidateSignup = "api/apiValidateSignup.php";


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
    static apiUser()
    {
        //return "api/apiUser.php";
        return "http://localexaminator/api/apiUser.php";
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