function createTuple(data) 
{
    var tr = document.createElement("tr");

    data.forEach(item => {
        var td = document.createElement("td");
        td.innerHTML = item;
        tr.appendChild(td);
    });
}

function uploadTuple(table, tr) 
{
    table.appendChild(tr);
}