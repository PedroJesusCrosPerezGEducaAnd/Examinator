/* td buttons functions */
function fBtnAccept( ev ) 
{
    /**
     * Actualizar rol en la base de datos
     */
    ev.preventDefault();
    
    // Cuando le de al botón aceptar
    // Recojo el nombre de usuario y su rol
    var username = this.parentElement.parentElement.getElementsByTagName("td")[0].innerHTML;
    var role = this.parentElement.parentElement.getElementsByTagName("select")[0].value;
    console.log("Has hecho click en Aceptar, ponerle el rol:"+role+" al usuario:"+username);

    // Los guardo en formato json
    var json = {
        "field":"role",
        "value":role,
        "field_id":"name",
        "value_id":username
    }
    // Hago un fetch a la api que me actualiza el rol en la base de datos
    fetch(PHPapiUser, 
    {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        // Le paso el contenido por el body del POST, y listo
        body: JSON.stringify(json),
    })
    .then(response => {
        // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(json => {
        if (json.response == "true") {
            alert("¡El usuario se ha actualizado con éxito!");
        } else {
            alert("Se ha producido un error en el servidor.");
        }
    })
    .catch(error => {
        console.error('Error during fetch operation:', error);
    });
}

function fBtnDeny(/* ev */) 
{
    /* ev.preventDefault(); */
    alert("deny");
    document.body.style.backgroundColor = "black";
}