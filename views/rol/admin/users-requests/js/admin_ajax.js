window.addEventListener("load", function () {
    function resetTables() 
    {
        // Tabla donde aparecen los usuarios con rol = null
        let tRequestUsers = document.getElementById("tRequestUsers");
        let tbodyRequestUsers = tRequestUsers.getElementsByTagName("tbody")[0];

        // Tabla donde aparecen todos los usuarios los cuales su rol no sea nulo
        let tCrud_users = document.getElementById("crud_users");
        let tbodyCrud_users = tCrud_users.getElementsByTagName("tbody")[0];

        // Reseteo contenido de las tablas
        tbodyRequestUsers.innerHTML = tbodyCrud_users.innerHTML = "";


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
            uploadTable(jsonData, tbodyRequestUsers);
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
            uploadTable(jsonData, tbodyCrud_users);
        })
        .catch(error => {
            console.error('Error during fetch operation:', error);
        });
    }

    resetTables();
});

