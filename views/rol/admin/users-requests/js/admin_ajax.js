async function getPendingUsers() 
{
    try {
        const response = await fetch('http://localexaminator/api/apiUser.php?user=findByRole&role=null');
        const data = await response.json();

        if (response.ok) {
            console.log('Usuarios obtenidos con éxito:', data);
            // Aquí puedes manipular la información recibida (por ejemplo, mostrarla en la interfaz de usuario)
        } else {
            console.error('Error al obtener usuarios:', data.error);
            // Aquí puedes manejar el error de acuerdo a tus necesidades
        }
    } catch (error) {
        console.error('Error en la solicitud:', error.message);
        // Aquí puedes manejar errores de red u otros problemas de solicitud
    }
}

window.addEventListener("load", function () 
{ 
    array = JSON.parse(getPendingUsers());
    array.forEach(item => {
        uploadTuple(document.table[0],createTuple(item));
    });
});

