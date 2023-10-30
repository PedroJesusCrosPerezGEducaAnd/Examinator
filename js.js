/*
window.addEventListener("load", function () {

    //let btnLogin = document.getElementById("btnLogin");
    let btnLogin = document.querySelector("form[name='login']>input[name='login']");
    

    function start(ev) 
    {
        ev.preventDefault();
        fetch("api/apiValidateLogin.php")
            .then(x=>x.text())
            .then(y=>{
                let formLogin = document.querySelector("form[name='login']");
                let feedback = document.createElement("p");
                let userName = document.querySelector("form[name='login']>input[name='name']").value;

                if (userName == "pedro") {
                    feedback.innerHTML="Te has logeado correctamente";
                } else {
                    feedback.innerHTML="El usuario y contaseña son erróneos";
                }

                formLogin.appendChild(feedback);
            })
        

    }

    btnLogin.addEventListener("click",start);

})
*/
window.addEventListener("load", function () {

    let btnLogin = document.querySelector("form[name='login']>input[name='login']");
    
    function start(ev) 
    {
        /* ev.preventDefault();
        let ajax = new XMLHttpRequest();
        ajax.open("POST", "api/apiValidateLogin.php", true);
        
        ajax.onreadystatechange = function () {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    let formLogin = document.querySelector("form[name='login']");
                    let feedback = document.createElement("p");
                    let userName = document.querySelector("form[name='login']>input[name='name']").value;

                    if (userName === "pedro") {
                        feedback.innerHTML = "Te has logeado correctamente";
                    } else {
                        feedback.innerHTML = "El usuario y contaseña son erróneos";
                    }

                    formLogin.appendChild(feedback);
                }
            }
        };

        ajax.send(); */


        ev.preventDefault();
        let ajax = new XMLHttpRequest();
        ajax.open("POST", "api/apiValidateLogin.php", true);
        
        let name = "";
        let password = "";
        ajax.onreadystatechange = function () 
        {
            // Cuando la solicitud está completa
            if (ajax.readyState === 4) 
            { 
                let formLogin = document.querySelector("form[name='login']");
                let feedback = document.createElement("p");
                
                // Si la respuesta tiene un estado exitoso (HTTP 200 OK)
                if (ajax.status === 200) 
                { 
                    // Procesar la respuesta
                    let responseText = ajax.responseText;
                    console.log(responseText); // Muestra la respuesta en la consola

                    if (responseText == true) {
                        name = document.querySelector("form[name='login']>input['name']").value;
                        password = document.querySelector("form[name='login']>input['password']").value;
                        feedback.innerHTML = "Te has logeado correctamente";
                    } else {
                        feedback.innerHTML = "El usuario y contaseña son erróneos";
                    }
                } 
                else 
                {
                    // Si la respuesta tiene un estado diferente de 200 (por ejemplo, un error en el servidor), manejarlo aquí
                    console.error("Error en la solicitud: " + ajax.status);
                    feedback.innerHTML = "Ha habído un error en el servidor";
                }

                formLogin.appendChild(feedback);
            }
            ajax.send("name=pedro&password=123");
        };

        //ajax.send("name="+name+"&password="+password);
        //ajax.send("name=pedro&password=123");

        //const elem = new FormData;
        //elem.append(document.getElementsByTagName("input")[0].value);
        //elem.append(document.getElementsByTagName("input")[1].value);

        //ajax.send(elem);
        
    }

    btnLogin.addEventListener("click", start);

});
