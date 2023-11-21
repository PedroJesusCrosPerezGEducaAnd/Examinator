function uploadTable(jsonData, dstTable) 
{
    var data = jsonData.data;
    for (var user in data) 
    { 
        dstTable.appendChild(createTr(data[user].name));
    }
}


function createTr(name) 
{
    /* Creo fila */
    var row = document.createElement("tr");

    // Columna - Nombre
    var tdName = document.createElement("td");
    tdName.innerHTML = name;


    // Columna - Botones (accept && deny)
    /* Creo columna con botones aceptar y denegar */
    var tdButtons = document.createElement("td");
        // Aceptar
        var btnAccept = document.createElement("button");
        btnAccept.setAttribute("class","btnAccept");
        btnAccept.innerHTML = "Accept";
        //btnAccept.addEventListener("click", function () { fBtnAccept(ev) });
        btnAccept.addEventListener("click", fBtnAccept);
        tdButtons.appendChild(btnAccept);

        // Denegar
        var btnDeny = document.createElement("button");
        btnDeny.setAttribute("class","btnDeny");
        btnDeny.innerHTML = "Deny";
        btnDeny.addEventListener("click", fBtnDeny);
        tdButtons.appendChild(btnDeny);

    
    // Columna - Select roles
    var tdSelect = document.createElement("td");
        /* Creo select con roles */
        var select = createSelect();
    tdSelect.appendChild(select);


    /* Añado columnas a la fila */
    row.appendChild(tdName);
    row.appendChild(tdSelect);
    row.appendChild(tdButtons);

    return row;
}


function createSelect() 
{
    // TODO fetch data base
    /* Crear select con opciones */
    var select = document.createElement("select");
    select.setAttribute("class", "styled-select");
        // Option admin
        var optnAdmin = document.createElement("option")
        optnAdmin.setAttribute("value","admin");
        optnAdmin.innerHTML = "Admin";
    select.appendChild(optnAdmin);

        // Option student
        var optnStudent = document.createElement("option")
        optnStudent.setAttribute("value","student");
        optnStudent.innerHTML = "Student";
    select.appendChild(optnStudent);

        // Option teacher
        var optnTeacher = document.createElement("option")
        optnTeacher.setAttribute("value","teacher");
        optnTeacher.innerHTML = "Teacher";
    select.appendChild(optnTeacher);

    return select;
}



function uploadTableUsers(jsonData, dstTable) 
{
    var data = jsonData.data;
    for (var user in data) 
    { 
        dstTable.appendChild(createTrUsers(data[user]));
        // dstTable.appendChild(createTrUsers(data[user].name));
    }
}

function createTrUsers(user) 
{
    /* Creo fila */
    var row = document.createElement("tr");
    row.id = user.id;

    // Columna - Nombre
    var tdName = document.createElement("td");
    tdName.innerHTML = user.name;


    // Columna - Select roles
    var tdSelect = document.createElement("td");
        /* Creo select con roles */
        var select = createSelect();
        select.disabled = true;
    tdSelect.appendChild(select);


    /* Añado columnas a la fila */
    row.appendChild(tdName);
    row.appendChild(tdSelect);

    return row;
}

function createTrUsers2(name) 
{
    /* Creo fila */
    var row = document.createElement("tr");

    // Columna - Nombre
    var tdName = document.createElement("td");
    tdName.innerHTML = name;


    // Columna - Select roles
    var tdSelect = document.createElement("td");
        /* Creo select con roles */
        var select = createSelect();
        select.disabled = true;
    tdSelect.appendChild(select);


    /* Añado columnas a la fila */
    row.appendChild(tdName);
    row.appendChild(tdSelect);

    return row;
}