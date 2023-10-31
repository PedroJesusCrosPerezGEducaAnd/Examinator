class Exam 
{

    // Constructor
    constructor(id, date, user_id) 
    {
        this.id = id;
        this.date = date;
        this.user_id = user_id;
    }


    // Getters and Setters
    get id() {
        return this._id;
    }
    set id(newId) {
        this._id = newId;
    }

    get date() {
        return this._date;
    }
    set date(newDate) {
        this._date = newDate;
    }

    get user_id() {
        return this._user_id;
    }
    set user_id(newUser_id) {
        this._user_id = newUser_id;
    }


    // Methods
    printExam() 
    {
        console.log("ID: " + this.id + " | Date: " + this.date + " | User_ID: " + this.user_id);
    }

fgenerateExam() 
{
    var feedback = lblViewTeacherError;

    fetch(PHPapiGenerateExam, 
    {
        method: "POST"
    })
        .then(response => response.text())
        .then(y => {
            var arrExams = JSON.parse(y);
            console.log(arrExams);

        })
        .catch(error => {
            feedback.innerHTML = feedbackLoginForm["error"] + error;
        });
}



})
}
