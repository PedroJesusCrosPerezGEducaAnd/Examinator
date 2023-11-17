// Cuando la página se carga completamente
window.addEventListener("load", function () {

    // Obtener el contenido de la plantilla de pregunta
    fetch("http://serverpedroexaminator/views/rol/student/take_exam/templates/question.html")
    .then(x => x.text())
    .then(y => {
        // Crear un contenedor div y asignarle el HTML de la plantilla
        var contenedor = document.createElement("div");
        contenedor.innerHTML = y;

        // Obtener la primera pregunta del contenedor
        var pregunta = contenedor.firstChild;

        // Obtener las preguntas del servidor mediante una solicitud POST a la API
        fetch("http://serverpedroexaminator/api/apiExam_has_question.php?exam_has_question=findByExam_id",
        {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(localStorage.getItem("exam_id"))
        })
        .then(response => {
            // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Obtener elementos del DOM relevantes
            let divExam = document.querySelector("div[name='examen']");
            let btnSiguiente = document.querySelector("#btnSiguiente");
            let btnAnterior = document.querySelector("#btnAnterior");

            var length = data.arrayQuestion.length;
            // Iterar sobre las preguntas y crear elementos para cada una
            for (var i = 0; i < length; i++) 
            {
                var question = data.arrayQuestion[i];
                var pregAux = pregunta.cloneNode(true);

                // Agregar clases y asignar contenido
                pregAux.classList.add("question");
                pregAux.key = question.id;
                pregAux.getElementsByClassName("key")[0].innerHTML = question.id;
                pregAux.getElementsByClassName("statement")[0].innerHTML = question.statement;

                // Asignar opciones de la pregunta
                for (var j = 0; j < question.question.length; j++) {
                    pregAux.getElementsByClassName("option" + (j + 1))[0].innerHTML = question.question[j];
                }

                // TODO: Averiguar por qué no se puede leer del servidor en JSON
                // pregAux.getElementsByClassName("difficulty")[0].innerHTML = question.difficulty_id;
                // pregAux.getElementsByClassName("category")[0].innerHTML = question.category_id;

                // Agregar la pregunta al contenedor y ocultarla
                divExam.appendChild(pregAux);
                pregAux.style.display = "none";
            }

            // INICIALIZAR
                // Mostrar la primera pregunta
                //divExam.firstChild.style.display = "block";
                divExam.firstElementChild.style.display = "block";

                let preguntaActual = 0;
                btnAnterior.disabled = true;

            // Función para mostrar la siguiente pregunta
            function mostrarSiguiente() {
                divExam.children[preguntaActual].style.display = "none";
                preguntaActual = (preguntaActual + 1) % divExam.children.length;
                divExam.children[preguntaActual].style.display = "block";

                // Mostrar/Ocultar botón NEXT
                if ( preguntaActual == data.arrayQuestion.length-1 ) {
                    btnSiguiente.disabled = true;
                } else {
                    btnSiguiente.disabled = false;
                }

                // Mostrar/Ocultar botón BEFORE
                if ( preguntaActual == 0 ) {
                    btnAnterior.disabled = true;
                } else {
                    btnAnterior.disabled = false;
                } 
            }
            // Agregar evento al botón "Siguiente"
            btnSiguiente.addEventListener("click", mostrarSiguiente);

            // Función para mostrar la pregunta anterior
            function mostrarAnterior() {
                divExam.children[preguntaActual].style.display = "none";
                preguntaActual = (preguntaActual - 1 + divExam.children.length) % divExam.children.length;
                divExam.children[preguntaActual].style.display = "block";

                // Mostrar/Ocultar botón NEXT
                if ( preguntaActual == data.arrayQuestion.length-1 ) {
                    btnSiguiente.disabled = true;
                } else {
                    btnSiguiente.disabled = false;
                }

                // Mostrar/Ocultar botón BEFORE
                if ( preguntaActual == 0 ) {
                    btnAnterior.disabled = true;
                } else {
                    btnAnterior.disabled = false;
                } 
            }
            // Agregar evento al botón "Anterior"
            btnAnterior.addEventListener("click", mostrarAnterior);
        })
    })
})
