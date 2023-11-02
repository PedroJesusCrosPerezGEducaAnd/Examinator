window.addEventListener("load", function () {


// ################################################################################
// ################################## LOGIN #######################################
// ################################################################################
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
            if (y == '\r\nfalse') { //if (y == '\r\ntrue') {
                msgFeedback = feedbackLoginForm["false"];
                //feedback.style(".error"); // TODO crear estilo error
            } else {
                msgFeedback = feedbackLoginForm["true"];
                //feedback.style(".valid"); // TODO crear estilo valid
                formDivLogin.style.display="none";
                viewTeacher.style.display="";
                //location.href = window.location.href + '?menu=';
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
// ################################ SIGN UP #######################################
// ################################################################################
function fvalidateSignup(ev) 
{
    ev.preventDefault();
    var formData = new FormData(formSignup);
    var msgFeedback = "";
    alert("FUNCIONA");

    fetch(PHPapiValidateSignup, 
    {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(y => {
            // TODO entender ¿Por qué hay que poner '\r\ntrue' en vez de 'true'?
            if (y == '\r\ntrue') {
                msgFeedback = feedbackSignupForm["true"];
                //feedback.style(".valid"); // TODO crear estilo valid
                formDivSignup.style.display="none";
                viewTeacher.style.display="";
            } else {
                msgFeedback = feedbackSignupForm["false"];
                //feedback.style(".error"); // TODO crear estilo error
            }

            //formDivSignup.appendChild(feedback);
            lblSignupFeedback.innerHTML = msgFeedback;
        })
        /*.catch(error => {
            feedback.innerHTML = feedbackSignupForm["error"] + error;
        });*/
}

btnSignup.addEventListener("click", fvalidateSignup);
alert("HOLAAAA");
this.alert("HOLAAAA2");

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