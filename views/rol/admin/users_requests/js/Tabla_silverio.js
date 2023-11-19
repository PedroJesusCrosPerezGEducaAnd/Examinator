//Libreria de manejo de tablas
HTMLTableRowElement.prototype.editada=false;
HTMLTableRowElement.prototype.borrar=function(){
    this.remove();
}
HTMLTableRowElement.prototype.editar=function(){
    if (!this.editada){
        this.editada=true;
        var celdas=this.getElementsByTagName("td");
        var n=celdas.length;
        for (let i=0;i<n;i++){
            let hijos=celdas[i].childNodes;
            //SI EL CONTENIDO ES TEXTO
            if (hijos.length==1 && hijos[0].nodeType==3){
                var input=document.createElement("input");
                input.setAttribute("type","text");
                input.value=celdas[i].innerHTML;
                celdas[i].innerHTML="";
                celdas[i].appendChild(input);
            }
        }
    }
}

HTMLTableRowElement.prototype.guardar=function(){
    if (this.editada){
        var celdas=this.getElementsByTagName("td");
        var tamano=celdas.length;
        for (let i=0;i<tamano;i++){
            var hijos=celdas[i].childNodes;
            if(hijos.length==1 && 
            hijos[0].nodeName=="INPUT" && 
            hijos[0].type=="text"){
                celdas[i].innerHTML=hijos[0].value;
            }
        }
        this.editada=false;
    }
}


HTMLTableElement.prototype.editar=function(bool=true){
    var estado=this.editada||false;
    function editar(){
        //Oculto boton Edit y Borr
        this.style.display="none";
        this.nextElementSibling.style.display="none";
        this.parentNode.lastElementChild.style.display="";
        this.parentNode.parentNode.editar();
    }
    function guardar(){
        var fila=this.parentNode.parentNode;
        fila.guardar();
        this.style.display="none";
        this.previousElementSibling.style.display="";
        this.previousElementSibling.previousElementSibling.style.display="";
    }
    function borrar(){
        this.parentNode.parentNode.borrar();
    }
    if (bool && ! estado){
        this.editada=true;
        
        var thead=this.getElementsByTagName("thead");
        if (thead.length>0){
            const celda=document.createElement("th");
            celda.innerHTML="Acción";
            celda.className="qwert_edic";
            thead[0].lastElementChild.appendChild(celda);
        }
        var tbodies=this.getElementsByTagName("tbody");
        var n=tbodies.length;
        for(let i=0;i<n;i++){
            var filas=tbodies[i].getElementsByTagName("tr");
            var k=filas.length
            for (let j=0; j<k;j++){
                var celda=document.createElement("td");
                celda.className="qwert_edic";
                var btnEditar=document.createElement("span");
                btnEditar.className="boton editar";
                btnEditar.onclick=editar;
                var btnBorrar=document.createElement("span");
                btnBorrar.className="boton borrar";
                btnBorrar.onclick=borrar;
                var btnGuardar=document.createElement("span");
                btnGuardar.className="boton guardar";
                btnGuardar.onclick=guardar;
                btnGuardar.style.display="none";
                //Logica de los botones

                
                celda.append(btnEditar);
                celda.append(btnBorrar);
                celda.append(btnGuardar);              
                filas[j].appendChild(celda);
            }
        }
    } else if(!bool && estado){
        this.editada=false;
        const elementos = this.getElementsByClassName("qwert_edic");
        let tamano=elementos.length;
        for(let i=0;i<tamano;i++){
            elementos[0].remove();
        }
        var filas=this.getElementsByTagName("tr");
        tamano=filas.length;
        for (let i=0;i<tamano;i++){
            filas[i].guardar();
        }
    }
}


window.addEventListener("load",function(){
    var tablas=document.getElementsByTagName("table");
    var tamano=tablas.length;
    for(let i=0;i<tamano;i++)
        tablas[i].ondblclick=function(){
            this.editar(!(this.editada||false))
        }

    tablas = document.querySelectorAll("table.editada");
    var tamano=tablas.length;
    for(let i=0;i<tamano;i++)
        tablas[i].editar(true);

})
