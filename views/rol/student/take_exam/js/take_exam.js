window.addEventListener("load", function () {

    fetch("http://serverpedroexaminator/views/rol/student/take_exam/templates/question.html")
    .then(x => x.text())
    .then(y => {
        var contenedor = document.createElement("div");
        contenedor.innerHTML = y;

        var pregunta = contenedor.firstChild;
        fetch("http://serverpedroexaminator/api/apiExam_has_question.php?exam_has_question=findByExam_id",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(localStorage.getItem("exam_id")),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            let divExam = document.querySelector("div[name='examen']");
            let btnSiguiente = document.querySelector("#btnSiguiente");
            let btnAnterior = document.querySelector("#btnAnterior");

            // Iterar sobre las preguntas
            for (var i = 0; i < data.arrayQuestion.length; i++) {
                var question = data.arrayQuestion[i];
                var pregAux = pregunta.cloneNode(true);

                pregAux.classList.add("question");
                pregAux.key = question.id;
                pregAux.getElementsByClassName("key")[0].innerHTML = question.id;
                pregAux.getElementsByClassName("statement")[0].innerHTML = question.statement;

                for (var j = 0; j < question.question.length; j++) {
                    pregAux.getElementsByClassName("option" + (j + 1))[0].innerHTML = question.question[j];
                }

                // TODO: Averiguar por qué no lo puedo leer del servidor en JSON
                // pregAux.getElementsByClassName("difficulty")[0].innerHTML = question.difficulty_id;
                // pregAux.getElementsByClassName("category")[0].innerHTML = question.category_id;

                divExam.appendChild(pregAux);

                pregAux.style.display = "none";
            }

            // Mostrar la primera pregunta
            divExam.firstChild.style.display = "block";

            let preguntaActual = 0;

            // Function NEXT
            function mostrarSiguiente() {
                divExam.children[preguntaActual].style.display = "none";
                preguntaActual = (preguntaActual + 1) % divExam.children.length;
                divExam.children[preguntaActual].style.display = "block";
            }
            // AddEventListener
            btnSiguiente.addEventListener("click", mostrarSiguiente);

            // Function BEFORE
            function mostrarAnterior() {
                divExam.children[preguntaActual].style.display = "none";
                preguntaActual = (preguntaActual - 1 + divExam.children.length) % divExam.children.length;
                divExam.children[preguntaActual].style.display = "block";
            }
            // AddEventListener
            btnAnterior.addEventListener("click", mostrarAnterior);
        })
    })

})
