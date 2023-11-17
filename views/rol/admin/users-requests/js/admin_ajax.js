// Espera hasta que la página se haya cargado completamente
window.addEventListener("load", function () {

    // Función para resetear el contenido de las tablas
    function resetTables() {
        // Tabla donde aparecen los usuarios con rol = null
        let tRequestUsers = document.getElementById("tRequestUsers");
        let tbodyRequestUsers = tRequestUsers.getElementsByTagName("tbody")[0];

        // Tabla donde aparecen todos los usuarios cuyo rol no sea nulo
        let tCrud_users = document.getElementById("crud_users");
        let tbodyCrud_users = tCrud_users.getElementsByTagName("tbody")[0];

        // Reseteo del contenido de las tablas
        tbodyRequestUsers.innerHTML = tbodyCrud_users.innerHTML = "";

        /**
         * Cargar usuarios pendientes de dar rol en la base de datos. Recién registrados
         */
        fetch(PHPapiUsersRequests, {
            method: "GET",
            headers: {"Content-Type": "application/json"}
        })
        .then(response => {
            // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(jsonData => {
            // Utiliza la función para añadir un JSON a un TBODY
            uploadTable(jsonData, tbodyRequestUsers);
        })
        // Si existe un error, lo captura con el método .catch()
        .catch(error => {
            // Console.error cambia la forma de imprimir mensajes por consola, a modo error
            console.error('Error during fetch operation:', error);
        });

        /**
         * Cargar usuarios con roles ya asignados
         */
        fetch(PHPapiUsersRoleNotnull, {
            method: "GET",
            headers: {"Content-Type": "application/json"}
        })
        .then(response => {
            // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(jsonData => {
            // Utiliza la función para añadir un JSON a un TBODY
            uploadTable(jsonData, tbodyCrud_users);
        })
        .catch(error => {
            // Console.error cambia la forma de imprimir mensajes por consola, a modo error
            console.error('Error during fetch operation:', error);
        });
    }

    // Llama a la función para resetear las tablas cuando la página se carga
    resetTables();
    
});
