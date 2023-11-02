window.addEventListener("load", function () {

// Función que llama a la api que valida las credenciales del formulario login
function fvalidateLogin(ev) 
{
    ev.preventDefault();
    var formData = new FormData(formLogin);
    var msgFeedback = "";

    fetch(PHPapiValidateLogin, 
    {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(y => {
            // TODO entender ¿Por qué hay que poner '\r\ntrue' en vez de 'true'?
            if (y == '\r\ntrue') {
                msgFeedback = feedbackLoginForm["true"];
                //feedback.style(".valid"); // TODO crear estilo valid
                formDivLogin.style.display="none";
                viewTeacher.style.display="";
            } else {
                msgFeedback = feedbackLoginForm["false"];
                //feedback.style(".error"); // TODO crear estilo error
            }

            //formDivLogin.appendChild(feedback);
            lblLoginFeedback.innerHTML = msgFeedback;
        })
        /*.catch(error => {
            feedback.innerHTML = feedbackLoginForm["error"] + error;
        });*/
}

btnLogin.addEventListener("click", fvalidateLogin);



// ################################################################################
// ########################### View Teacher #######################################
// ################################################################################
function flogout() 
{
    
}


btnGenerateExam.addEventListener("click", fgenerateExam);


// ################################################################################
// ######################### Generate exams #######################################
// ################################################################################
function fgenerateExam() 
{
    const exam = new Exam("urlplantilla","urldatos","objetoDestino");
    examen.descargar;
    examen.mostrar;

}


btnGenerateExam.addEventListener("click", fgenerateExam);



});