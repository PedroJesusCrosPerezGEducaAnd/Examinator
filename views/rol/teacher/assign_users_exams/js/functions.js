/*function remove() 
{
    var dstDiv = document.getElementById("select_questions");
    var auxquestion = this.cloneNode(true);

    dstDiv.appendChild(auxquestion);

    auxquestion.addEventListener("click",add);
    this.style.display="none";
}*/

function add() 
{
    /*var dstDiv = document.getElementById("selected_questions");
    var auxquestion = this.cloneNode(true);

    dstDiv.appendChild(auxquestion);

    auxquestion.addEventListener("click",remove);
    this.style.display="none";*/
    this.classList = "selected";
}

/*function save() 
{
    var divs = document.querySelectorAll("#select_questions > div");
    var divsArray = Array.from(divs);
    var question_id_array = [];

    divsArray.forEach(function (div) {
        question_id_array.push(div.key);
    });
    
    fetch("http://serverpedroexaminator/api/apiExam_has_question.php", 
    {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(question_id_array),
    })
    .then(response => {
        // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(response => {
        var feedback = document.getElementById("feedback");
        feedback.innerHTML = (response=="true") ? Configfile.getFeedbackCrudExam().true : Configfile.getFeedbackCrudExam().true;
        feedback.classList = "true";
        feedback.style.fontSize = "";
    })
    
}*/

/*
function createDiv(id) {
    
}*/