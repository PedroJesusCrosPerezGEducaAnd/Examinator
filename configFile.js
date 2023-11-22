//TODO tengo que pasar todo esto a una clase

// URL Api's
var urlActual = window.location.href;
var urlBase = urlActual.split('?')[0];

// User
let PHPapiUsersRequests = urlBase+"api/apiuser.php?user=findByRole&role=null";
let PHPapiUsersRoleNotnull = urlBase+"api/apiuser.php?user=findByRole&role=notnull";
let PHPapiUser = urlBase+"api/apiUser.php";
// Question
let PHPapiQuestion = urlBase+"api/apiQuestion.php";
let PHPapiQuestionFindAll = urlBase+"api/apiQuestion.php?question=findall";
// User has exam
let PHPapiUser_has_exam = urlBase+"api/apiUser_has_exam.php?user_has_exam=findByUser_id";
// Exam has questions
let PHPapiExam_has_question = urlBase+"api/apiExam_has_question.php?exam_has_question=findByExam_id"; // AQUI &exam=4


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
let feedbackCrudQuestion = "";
let feedbackCrudExam = "";


class Configfile 
{

    // ###################################################################################################
    // ########################################### FEEDBACK ##############################################
    // ###################################################################################################
        /* ========================================================================================= */
        /* ================================ LOGIN - FORM =========================================== */
        /* ========================================================================================= */
    static getFeedbackLoginForm()
    {
        return feedbackLoginForm = 
        {
            "true" : "Te has logeado correctamente",
            "false" : "Las credenciales son incorrectas",
            "error" : "Se ha producido un error en el servidor: "
        }
    }
        /* ========================================================================================= */
        /* =============================== SIGNUP - FORM =========================================== */
        /* ========================================================================================= */
    static getFeedbackSignupForm()
    {
        return feedbackSignupForm =
        {
            "true" : "Te has registrado correctamente",
            "false" : "Los campos introducidos son incorrectos",
            "error" : "Se ha producido un error en el servidor: "
        }
    }



    /* ========================================================================================= */
    /* ================================ CRUD - QUESTION ======================================== */
    /* ========================================================================================= */
    static getFeedbackCrudQuestion()
    {
        return feedbackCrudQuestion = 
        {
            "true" : "¡Se ha creado con éxito!",
            "false" : "Debes rellenar todos los campos, para crear la pregunta.",
            "error" : "Se ha producido un error en el servidor: "
        }
    }

        /* ========================================================================================= */
        /* ================================= CRUD - EXAM =========================================== */
        /* ========================================================================================= */
    static getFeedbackCrudExam()
    {
        return feedbackCrudExam =
        {
            "true" : "¡Se ha creado con éxito!",
            "false" : "Debes seleccionar las preguntas correctas, error de lógica: ",
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