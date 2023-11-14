window.addEventListener("load", function () 
{
    console.log(PHPapiRequestsUsers);
    console.log(PHPapiRequestsUsers);
    console.log(PHPapiRequestsUsers);
    //fetch(Configfile.apiEntity("user", "findRole", "role", "null"), {
    fetch(PHPapiRequestsUsers, 
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

        var table = document.getElementById("tRequestUsers");
        var tbody = table.getElementsByTagName("tbody")[0];
        uploadTable(jsonData, tbody);
    })
    .catch(error => {
        console.error('Error during fetch operation:', error);
    });

});
