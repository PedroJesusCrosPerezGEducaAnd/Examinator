/* td buttons functions */
function fBtnAccept(ev) 
{
    /**
     * Actualizar rol en la base de datos
     */
    alert("FUNCIONA");
    alert(this);
    ev.preventDefault();
    fetch(PHPapiUsersRoleNotnull, 
    {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
        body: json,
    })
    .then(response => {
        // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(jsonData => {
        alert("hola2");
    })
    .catch(error => {
        console.error('Error during fetch operation:', error);
    });
}

fBtnDeny