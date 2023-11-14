class Exam 
{

    // Constructor
    constructor(url_template, url_api, obj_destination) 
    {
        this.url_template = url_template;
        this.url_api = url_api;
        this.obj_destination = obj_destination;
    }


    // Getters and Setters
    get url_template() {
        return this.url_template;
    }
    set url_template(url_template) {
        this.url_template = url_template;
    }

    get url_api() {
        return this.url_api;
    }
    set url_api(url_api) {
        this.url_api = url_api;
    }

    get obj_destination() {
        return this.obj_destination;
    }
    set obj_destination(obj_destination) {
        this.obj_destination = obj_destination;
    }


    // Methods
    printExam() 
    {
        console.log("url_template: " + this.url_template + " | url_api: " + this.url_api + " | obj_destination: " + this.obj_destination);
    }

generateExam() 
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

}
