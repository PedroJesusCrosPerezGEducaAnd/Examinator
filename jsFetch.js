window.addEventListener("load", function () 
{
    let btnLogin = document.querySelector("form[name='login']>input[name='login']");

    function start(ev) {
        ev.preventDefault();
        let form = document.querySelector("form[name='login']");
        let formData = new FormData(form);
        let feedback = document.createElement("p");

        fetch("api/apiValidateLogin.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text())
            .then(y => {
                console.log("Respuesta del servidor: " + y);

                if (y === 'true') {
                    feedback.innerHTML = "Te has logeado correctamente";
                } else {
                    feedback.innerHTML = "El usuario y contraseña son erróneos";
                }

                form.appendChild(feedback);
            })
            .catch(error => {
                console.error("Error de red:", error);
            });
    }

    btnLogin.addEventListener("click", start);
});
