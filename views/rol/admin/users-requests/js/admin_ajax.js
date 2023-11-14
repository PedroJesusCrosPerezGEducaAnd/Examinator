window.addEventListener("load", function () 
{
    /**
     * Cargar usuarios pendientes de dar rol en la base de datos. Recién registrados
     */
    fetch(PHPapiUsersRequests, 
    {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(response => {
        // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(jsonData => {
        var table = document.getElementById("tRequestUsers");
        var tbody = table.getElementsByTagName("tbody")[0];
        uploadTable(jsonData, tbody);
    })
    .catch(error => {
        console.error('Error during fetch operation:', error);
    });



    /**
     * Cargar usuarios con roles ya puestos
     */
    fetch(PHPapiUsersRoleNotnull, 
    {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(response => {
        // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(jsonData => {
         var table = document.getElementById("tUsersRoleNotnull");
        var tbody = table.getElementsByTagName("tbody")[0];
        uploadTable(jsonData, tbody);
    })
    .catch(error => {
        console.error('Error during fetch operation:', error);
    });

});

