window.addEventListener("load", function () 
{
    
// Función que llama a la api que valida las credenciales del formulario login
function fvalidateLogin(ev) 
{
    ev.preventDefault();
    var formData = new FormData(formLogin);
    var feedback = lblLoginError;

    fetch(PHPapiValidateLogin, 
    {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(y => {
            if (y === 'true') {
                feedback.innerHTML = feedbackLoginForm["true"];
                //feedback.style(".valid"); // TODO crear estilo valid
                formDivLogin.style.display="none";
                viewTeacher.style.display="";
            } else {
                feedback.innerHTML = feedbackLoginForm["false"];
                //feedback.style(".error"); // TODO crear estilo error
            }

            formDivLogin.appendChild(feedback);
        })
        .catch(error => {
            feedback.innerHTML = feedbackLoginForm["error"] + error;
        });
}

btnLogin.addEventListener("click", fvalidateLogin);


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