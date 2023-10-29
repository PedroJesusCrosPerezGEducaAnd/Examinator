window.addEventListener("load", function () {

    //let btnLogin = document.getElementById("btnLogin");
    let btnLogin = document.querySelector("form[name='login']>input[name='login']");
    
    btnLogin.addEventListener("click",start);

    function start() 
    {
        fetch("index.html")
            .then(x=>x.text())
            .then(y=>{
                let formLogin = document.querySelector("form[name='login']");
                let feedback = document.createElement("p");
                feedback.innerHTML="Te has logeado correctamente";

                formLogin.appendChild(feedback);
            })
        

    }

})