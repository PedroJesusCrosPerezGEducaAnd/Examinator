function rellenaProvincia() 
{
    if (estadoInputDireccion) {
        var ajax=new XMLHttpRequest();
        var provinc = document.getElementById("slctProvincia");
        ajax.open('get', 'http://localhost/pedroWebs/docXML/data.xml');
        ajax.onreadystatechange=function() {
            if ( ajax.readyState==4 && ajax.status==200) {
                var respuesta=ajax.responseXML;
                    var prov="";
                var entradas=respuesta.getElementsByTagName("provincia");
                    prov += "<option> </option>";
                for (let i=0;i<entradas.length;i++) {
                        prov += "<option>" + entradas[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue + "</option>"; 
                }
                    provinc.innerHTML = prov;
            }
        }
        ajax.send();
    }

}

function rellenaLocalidad()
{
    var provinciaNombre = document.getElementById("slctProvincia").value;
    var ajax=new XMLHttpRequest();
    var loc = document.getElementById("slctLocalidad");
    ajax.open('get', 'data.xml');
    ajax.onreadystatechange=function(){
        if ( ajax.readyState==4 && ajax.status==200){
            var respuesta=ajax.responseXML;
            var local="";
            var provincias=respuesta.getElementsByTagName("provincia");
            for (let i=0;i<provincias.length;i++){
                if(provincias[i].getElementsByTagName("nombre")[0].textContent == provinciaNombre){
                    var localidades = provincias[i].getElementsByTagName("localidad");
                    for(let a=0;a<localidades.length;a++){
                        var lo = localidades[a].textContent;
                        local += "<option value='" + lo + "' >" + lo + "</option>"; 
                    }
                }
            }
            loc.innerHTML = local;
        }
    }
    ajax.send();
}
