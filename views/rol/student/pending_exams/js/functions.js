function saveExam_idLocalStorage() 
{
    localStorage.setItem("exam_id", this.exam_id);
    alert(this.localStorage.getItem("exam_id"));
}

function createPendingExam(exam_id, dstDiv) 
{
    let exam = document.createElement("a");
    exam.exam_id = exam_id;
    exam.innerHTML = exam_id == "" ? "null" : exam_id;
    exam.classList = "exam";
    //exam.addEventListener("click", takeExam);
    exam.setAttribute("href", "?rol=student&student=take_exam&exam="+exam_id);
    exam.addEventListener("click", saveExam_idLocalStorage);

    dstDiv.appendChild(exam);
}

function createPendingExams(arrExam_id) 
{
    var pendingExams = document.getElementById("pending_exams");

    var length = arrExam_id.length;
    for (let i = 0; i < length; i++) {
        createPendingExam(arrExam_id[i], pendingExams);
    }
}
