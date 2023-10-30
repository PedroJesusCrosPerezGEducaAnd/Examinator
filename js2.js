window.addEventListener("load", function () {
    let btnLogin = document.querySelector("form[name='login']>input[name='login']");

    function start(ev) {
        ev.preventDefault();
        let ajax = new XMLHttpRequest();
        ajax.open("POST", "api/apiValidateLogin.php", false);

        ajax.onreadystatechange = function () {
            if (ajax.readyState === 4) {
                let formLogin = document.querySelector("form[name='login']");
                let feedback = document.createElement("p");

                if (ajax.status === 200) {
                    let responseText = ajax.responseText;
                    console.log(responseText);
                
                    if (responseText === "true") { // Comparar con las cadenas "true" y "false"
                        //let name = document.querySelector("form[name='login']>input[name='name']").value;
                        //let password = document.querySelector("form[name='login']>input[name='password']").value;
                        feedback.innerHTML = "Te has logeado correctamente";
                    } else if (responseText === "false") {
                        feedback.innerHTML = "El usuario y contraseña son erróneos";
                    } else {
                        feedback.innerHTML = "Respuesta inesperada del servidor";
                    }
                } else {
                    console.error("Error en la solicitud: " + ajax.status);
                    feedback.innerHTML = "Ha habido un error en el servidor";
                }

                formLogin.appendChild(feedback);
            }
        };

        //ajax.send("name=pedro&password=123");

        var datos = "name=" + encodeURIComponent("pedro") + "&password=" + encodeURIComponent("123");
        ajax.send(datos);
    }

    function startsimple(ev)
    {
        ev.preventDefault();
        let ajax = new XMLHttpRequest();
        ajax.open("POST", "api/apiValidateLogin.php", false);

        ajax.onreadystatechange = function () {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    let responseText = ajax.responseText;
                    console.log(responseText);
                }
            }
        }
        
        ajax.send("name=pedro&password=123");
    }

    btnLogin.addEventListener("click", startsimple);
    
});
