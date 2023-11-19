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
            console.log(data); // Depurar
            console.log(data.arrayQuestion[0].statement); // Depurar
            // Obtener elementos del DOM relevantes
            //let divExam = document.querySelector("div[name='examen']");
            let divExam = document.getElementById("exam_container");
            let btnNext = document.querySelector("#btnNext");
            let btnBefore = document.querySelector("#btnBefore");

            var length = data.arrayQuestion.length;
            // Iterar sobre las preguntas y crear elementos para cada una
            for (var i = 0; i < length; i++) 
            {
                var question = data.arrayQuestion[i];
                var pregAux = pregunta.cloneNode(true);

                // Agregar clases y asignar contenido
                pregAux.classList.add("question");
                pregAux.key = question.id;
                pregAux.getElementsByClassName("question_id")[0].innerHTML = question.id;
                pregAux.getElementsByClassName("statement")[0].innerHTML = question.statement || "Default Statement";//question.statement;

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




            // ########################################################################
            // ################### FUNCTIONS ENABLE/DISABLE ###########################
            // ########################################################################
            // NEXT
            function disableNext() {
                btnNext.querySelector('img').src = "http://serverpedroexaminator/views/src/icons/arrow_next_disabled512px.png";
                btnNext.addEventListener("click", function(){});
                //btnNext.style.pointerEvents = "none";
                btnNext.disabled = true;
            }
            function enableNext() {
                btnNext.querySelector('img').src = "http://serverpedroexaminator/views/src/icons/arrow_next512px.png";
                btnNext.addEventListener("click", showNext);
                //btnNext.style.pointerEvents = "all";
                btnNext.disabled = false;
            }

            // BEFORE
            function disableBefore() {
                btnBefore.querySelector('img').src = "http://serverpedroexaminator/views/src/icons/arrow_before_disabled512px.png";
                btnBefore.addEventListener("click", function(){});
                //btnBefore.style.pointerEvents = "none";
                btnBefore.disabled = true;
            }
            function enableBefore() {
                btnBefore.querySelector('img').src = "http://serverpedroexaminator/views/src/icons/arrow_before512px.png";
                btnBefore.addEventListener("click", showBefore);
                //btnBefore.style.pointerEvents = "all";
                btnBefore.disabled = false;
            }


            // INICIALIZAR
                // Mostrar la primera pregunta
                //divExam.firstChild.style.display = "flex";
                divExam.firstElementChild.style.display = "flex";

                let preguntaActual = 0;
                //btnBefore.disabled = true;
                //btnBefore.style.pointerEvents = "none";
                disableBefore();
            
            
            // ########################################################################
            // ################ FUNCTIONS MOVE ON QUESTIONS ###########################
            // ########################################################################
            // Función para mostrar la siguiente pregunta
            function showNext() {
                divExam.children[preguntaActual].style.display = "none";
                preguntaActual = (preguntaActual + 1) % divExam.children.length;
                divExam.children[preguntaActual].style.display = "flex";

                // Mostrar/Ocultar botón NEXT
                if ( preguntaActual == data.arrayQuestion.length-1 ) {
                    //btnNext.disabled = true;
                    //btnNext.style.pointerEvents = "all";
                    disableNext();
                } else {
                    //btnNext.disabled = false;
                    //btnNext.style.pointerEvents = "none";
                    enableNext();
                }

                // Mostrar/Ocultar botón BEFORE
                if ( preguntaActual == 0 ) {
                    //btnBefore.disabled = true;
                    //btnBefore.style.pointerEvents = "all";
                    disableBefore();
                } else {
                    //btnBefore.disabled = false;
                    //btnBefore.style.pointerEvents = "none";
                    enableBefore();
                } 
            }
            // Agregar evento al botón "Siguiente"
            btnNext.addEventListener("click", showNext);

            // Función para mostrar la pregunta anterior
            function showBefore() {
                divExam.children[preguntaActual].style.display = "none";
                preguntaActual = (preguntaActual - 1 + divExam.children.length) % divExam.children.length;
                divExam.children[preguntaActual].style.display = "flex";

                // Mostrar/Ocultar botón NEXT
                if ( preguntaActual == data.arrayQuestion.length-1 ) {
                    //btnNext.disabled = true;
                    disableNext();
                } else {
                    //btnNext.disabled = false;
                    enableNext();
                }

                // Mostrar/Ocultar botón BEFORE
                if ( preguntaActual == 0 ) {
                    //btnBefore.disabled = true;
                    disableBefore();
                } else {
                    //btnBefore.disabled = false;
                    enableBefore();
                } 
            }
            // Agregar evento al botón "Anterior"
            btnBefore.addEventListener("click", showBefore);
        })
    })
})
