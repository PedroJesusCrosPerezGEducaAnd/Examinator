// CLASE TABLA
HTMLTableElement.prototype.editar = function (bool = true) 
{
    if (bool && !estado) {

        var thead = this.getElementsByTagName("thead");
        if (thead.length > 0) {
            const celda = document.createElement("th");
            celda.innerHTML = "Acción";
            celda.className="qwert_edic";
            thead[0].lastElementChild.appendChild(celda);
        }
        var tbodies = this.getElementsByTagName("tbody");
        var n = tbodies.length;
        for (let i = 0; i < n; i++) {
            var filas = tbodies[i].getElementsByTagName("tr"); // 'var filas' es un array de <tr>
            var k = filas.length;
            for (let j = 0; i < k; i++) {
                var celda = document.createElement("td");
                celda.className="qwert_edic";
                var btnEditar=document.createElement("span");
                btnEditar.className="boton editar";
                var btnBorrar=document.createElement("span");
                btnBorrar.className="boton borrar";
                var btnGuardar=document.createElement("span");
                btnGuardar.className="boton guardar";
                celda.append(btnEditar);
                celda.append(btnBorrar);
                celda.append(btnGuardar);
                filas[j].appendChild(celda);

            }
        }
    } else if (!bool && estado) {
        this.editada=false;
        const elementos = this.getElementsByTagName("td");
        for (let i = 0; i < elementos.length; i++) {
            if (elementos[i].innerHTML == "ACC") {
                elementos[i].parentNode.removeChild(elementos[i]);
            }

        }
    }
}
window.addEventListener("load", function () {
    var tablas = this.document.getElementsByTagName("table");
    var tam = tablas.length;
    for (let index = 0; index < tam; index++) {
        tablas[index].ondbclick = function () {
            this.editar(!(this.editada || false));
        }
    }

    tablas = document.querySelectorAll("table.editada");
    var tam = tablas.length;
    for (let index = 0; index < tam; index++) {
        tablas[index].editar(true);

    }

})

HTMLTableRowElement.prototype.guardar = function()
{
    var celdas=this.getElementsByTagName("td");
    var tamano=celdas.length;
    for (let i=0;i<tamano;i++){
        var hijos=celdas[i].childNodes;
        if (hijos.length==1 && hijos[0].nodeName=="INPUT" && hijos[0].type=="text") {
            celdas[i].innerHTML=hijos[0].value
            
        }
    }
}