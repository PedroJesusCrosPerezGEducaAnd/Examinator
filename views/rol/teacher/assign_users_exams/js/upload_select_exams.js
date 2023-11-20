window.addEventListener("load", function () {

    let divExams = document.getElementById("select_exams");

    fetch("http://serverpedroexaminator/views/rol/teacher/assign_users_exams/templates/exam.html")
    .then(x=>x.text())
    .then(y=>{
        var contenedor = document.createElement("div");
        contenedor.innerHTML = y;
        
        var exam = contenedor.firstChild;
        fetch("http://serverpedroexaminator/api/apiExam.php?exam=findAll", 
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
            data = data.data;
            var length = data.length;
            
            for (let i = 0; i < length; i++) 
            {
                var examAux = exam.cloneNode(true);

                examAux.getElementsByClassName("id")[0].innerHTML = data[i];
                
                divExams.appendChild(examAux);
            }
        })
    })


    
    let divUsers = document.getElementById("select_users");

    fetch("http://serverpedroexaminator/views/rol/teacher/assign_users_exams/templates/user.html")
    .then(x=>x.text())
    .then(y=>{
        var contenedor = document.createElement("div");
        contenedor.innerHTML = y;
        
        var exam = contenedor.firstChild;
        fetch("http://serverpedroexaminator/api/apiUser.php?user=findByRole&role=notnull", 
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
            data = data.data;
            var length = data.length;
            
            for (let i = 0; i < length; i++) 
            {
                var userAux = exam.cloneNode(true);

                userAux.getElementsByClassName("id")[0].innerHTML = data[i];
                
                divUsers.appendChild(userAux);
            }
        })
    })


    //var btnsave = this.document.getElementsByName("save")[0];
    //btnsave.addEventListener("click", save)
});