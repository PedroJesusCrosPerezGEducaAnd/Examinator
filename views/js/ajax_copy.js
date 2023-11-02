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