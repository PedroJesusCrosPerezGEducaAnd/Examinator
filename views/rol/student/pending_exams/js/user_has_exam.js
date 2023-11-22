window.addEventListener("load", function () {

    fetch(PHPapiUser_has_exam, 
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
        console.log(jsonData);
        if (jsonData || jsonData == "true") {
            createPendingExams(jsonData);
        } else if (jsonData == false) {
            alert("¡¡No tienes ningún exámen asignado todavía!!");
        } else {
            alert(jsonData);
        }
    })
    .catch(error => {
        console.error('Error during fetch operation:', error);
    });

})