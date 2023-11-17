window.addEventListener("load", function () {

    let divExamen = document.getElementById("select_questions");

        fetch("http://serverpedroexaminator/views/rol/teacher/crud_exams/templates/question.html")
        .then(x=>x.text())
        .then(y=>{
            var contenedor = document.createElement("div");
            contenedor.innerHTML = y;
            
            var pregunta = contenedor.firstChild;
            fetch("http://serverpedroexaminator/api/apiQuestion.php?question=findAll", 
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
            .then(data => {
                for (var key in data) {
                    if (data.hasOwnProperty(key)) 
                    {
                        var question = data[key];
                        var pregAux = pregunta.cloneNode(true);

                        pregAux.key=key;
                        pregAux.getElementsByClassName("key")[0].innerHTML = key;
                        pregAux.getElementsByClassName("statement")[0].innerHTML = question.statement;
                        pregAux.getElementsByClassName("option1")[0].innerHTML = question.question[0];
                        pregAux.getElementsByClassName("option2")[0].innerHTML = question.question[1];
                        pregAux.getElementsByClassName("option3")[0].innerHTML = question.question[2];
                        pregAux.getElementsByClassName("difficulty")[0].innerHTML = question.difficulty_id;
                        pregAux.getElementsByClassName("category")[0].innerHTML = question.category_id;
                        
                        pregAux.addEventListener("click",add);
                        divExamen.appendChild(pregAux);
                    }
                }
            })
        })


    var btnsave = this.document.getElementsByName("save")[0];
    btnsave.addEventListener("click", save)
});