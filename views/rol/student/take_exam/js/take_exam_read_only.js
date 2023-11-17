window.addEventListener("load", function () {

    // UPLOAD QUESTIONS
    /*fetch("http://serverpedroexaminator/views/rol/student/take_exam/templates/question.html")
    .then(x=>x.text())
    .then(y=>{
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
            // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // TODO depurar
            let divExam = document.querySelector("div[name='examen']");
            
            data.arrayQuestion.forEach(function(question) {
                var pregAux = pregunta.cloneNode(true);
                
                pregAux.key=question.id;
                pregAux.getElementsByClassName("key")[0].innerHTML = question.id;
                pregAux.getElementsByClassName("statement")[0].innerHTML = question.statement;
                pregAux.getElementsByClassName("option1")[0].innerHTML = question.question[0];
                pregAux.getElementsByClassName("option2")[0].innerHTML = question.question[1];
                pregAux.getElementsByClassName("option3")[0].innerHTML = question.question[2];
                
                divExam.appendChild(pregAux);
            });

        })
    })*/

    /*fetch("http://serverpedroexaminator/views/rol/student/take_exam/templates/question.html")
    .then(x=>x.text())
    .then(y=>{
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
            // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // TODO depurar
            let divExam = document.querySelector("div[name='examen']");
            
            var length = data.arrayQuestion.length;
            for (var i = 0; i < length; i++) {
                if (i == 0) {
                    data.arrayQuestion[i].current = true;
                } else {
                    data.arrayQuestion[i].current = false;
                }
                //console.log(data.arrayQuestion[i]);

                var question = data.arrayQuestion[i];
                var lengthj = question.question.length;
            
                var pregAux = pregunta.cloneNode(true);
            
                pregAux.key = question.id;
                pregAux.getElementsByClassName("key")[0].innerHTML = question.id;
                pregAux.getElementsByClassName("statement")[0].innerHTML = question.statement;
            
                // Utilizar el índice interno para asignar opciones de la pregunta a las clases correspondientes
                for (var j = 0; j < lengthj; j++) {
                    pregAux.getElementsByClassName("option" + (j + 1))[0].innerHTML = question.question[j];
                }
            
                // TODO: Averiguar por qué no lo puedo leer del servidor en JSON
                //pregAux.getElementsByClassName("difficulty")[0].innerHTML = question.difficulty_id;
                //pregAux.getElementsByClassName("category")[0].innerHTML = question.category_id;
            
                divExam.appendChild(pregAux);
            }

            data.arrayQuestion.forEach(function(question) {
                if (question.current == false) {
                    question.style.display = "none";
                }
            })
        })
    })*/

    

})