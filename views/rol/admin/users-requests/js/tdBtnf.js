/* Función para aceptar cambios de rol */
function fBtnAccept(ev) {
    /**
     * Actualizar rol en la base de datos
     */
    ev.preventDefault();

    // Cuando se hace clic en el botón "Aceptar"
    // Se recoge el nombre de usuario y su nuevo rol
    var username = this.parentElement.parentElement.getElementsByTagName("td")[0].innerHTML;
    var role = this.parentElement.parentElement.getElementsByTagName("select")[0].value;
    console.log("Has hecho clic en Aceptar, asignarle el rol:" + role + " al usuario:" + username);

    // Se guardan en formato JSON
    var json = {
        "field": "role",
        "value": role,
        "field_id": "name",
        "value_id": username
    };

    // Se realiza una solicitud fetch a la API para actualizar el rol en la base de datos
    fetch(PHPapiUser, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        // Se pasa el contenido a través del cuerpo del POST
        body: JSON.stringify(json)
    })
    .then(response => {
        // Se verifica si la respuesta está en el rango de códigos de éxito (200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(json => {
        // Se muestra una alerta según la respuesta del servidor
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

/* Función para denegar cambios */
function fBtnDeny(/* ev */) {
    /* ev.preventDefault(); */
    alert("Denegar");
    document.body.style.backgroundColor = "black";
}
