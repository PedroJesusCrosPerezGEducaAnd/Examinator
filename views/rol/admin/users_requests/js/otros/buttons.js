window.addEventListener("load",function () 
{
    //const tabla=document.getElementById("tabla");
    const tabla=document.getElementsByClassName("Tabla")[0];
    const tfoot = tabla.getElementsByTagName('tfoot')[0];
    const tbody = tabla.getElementsByTagName('tbody')[0];
    const inputs=tfoot.getElementsByTagName("input");
    const btnGuardar=tfoot.querySelector("span.boton");

    btnGuardar.addEventListener("click",guardarDatos);

    function editar() 
    {
        //Oculto btnAccepts de editar y de borrar
        this.style.display="none";
        this.nextElementSibling.style.display="none";
        this.parentNode.lastElementChild.style.display="";
        var fila=this.parentNode.parentNode;
        var celdas=fila.getElementsByTagName("td");
        var n=celdas.length;

        for(let i=0; i<n-1; i++) 
        {
            var input=document.createElement("input");
            input.setAttribute("name","accept");
            input.value=celdas[i].innerHTML;
            celdas[i].innerHTML="";
            celdas[i].appendChild(input);
        }
    }

    function borrar() 
    {
        this.parentNode.parentNode.remove();
    }

    function guardar() 
    {
        var fila=this.parentNode.parentNode;
        var celdas=fila.getElementsByTagName("td");
        var inputs=fila.getElementsByTagName("input");
        var n=celdas.length;
        for(let i=0; i<n-1; i++)
        {
            celdas[i].innerHTML=inputs[0].value;
        }
        this.style.display="none";
        this.previousElementSibling.style.display="";
        this.previousElementSibling.previousElementSibling.style.display="";
    }

    function guardarDatos() 
    {
        const fila=document.createElement("tr");
        let n=inputs.length;
        for(let i=0; i<n; i++) 
        {
            var td=document.createElement("td");
            td.innerHTML=inputs[i].value;
            fila.appendChild(td);
        }
        const btnAccept=document.createElement("span");
        btnAccept.className="btnAccept";
        btnAccept.innerHTML="Editar";
        btnAccept.onclick=editar;

        const btnDeny=document.createElement("span");
        btnDeny.className="btnDeny";
        btnDeny.innerHTML="Eliminar";
        btnDeny.onclick=borrar;

        const botonG=document.createElement("span");
        botonG.className="boton";
        botonG.innerHTML="G";
        botonG.style.display="none";
        botonG.onclick=guardar;

        const celda=document.createElement("td");
        celda.appendChild(btnAccept);
        celda.appendChild(btnDeny);
        celda.appendChild(botonG);

        fila.appendChild(celda);
        tbody.appendChild(fila);

        inputs[0].form.reset();

    }
})