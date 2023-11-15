window.addEventListener("load", function () {

// Prueba json de pregunta
var questions = {
    0: {
      statement: "¿Que tipo de lenguaje es HTML?",
      option1: {
        text: "Un lenguaje de programación",
        correct: false
      },
      option2: {
        text: "Un lenguaje de marcas",
        correct: true
      },
      option3: {
        text: "Un lenguaje de base de datos",
        correct: false
      }
    },
    1: {
        id: "2",
        statement: "¿Que tipo de lenguaje es Javascript?",
        option: "option1",
        option1: "Un lenguaje de programación",
        option2: "Un lenguaje de marcas",
        option3: "Un lenguaje de base de datos"
    },
    2: {
        statement: "¿Que tipo de lenguaje es Mysql?",
        option1: {
          text: "Un lenguaje de programación",
          correct: false
        },
        option2: {
          text: "Un lenguaje de marcas",
          correct: false
        },
        option3: {
          text: "Un lenguaje de base de datos",
          correct: true
        }
    }
};




    /**
     * DOM ELEMENTS
     * 
     */
    var form = document.forms[0];
    var questions = {
        0: {
          statement: "¿Que tipo de lenguaje es HTML?",
          option1: {
            text: "Un lenguaje de programación",
            correct: false
          },
          option2: {
            text: "Un lenguaje de marcas",
            correct: true
          },
          option3: {
            text: "Un lenguaje de base de datos",
            correct: false
          }
        }
    };

    
      form.addEventListener("submit", function(event) {
        event.preventDefault();
  
        var formData = new FormData(this);
        var any_field_empty = true;
  
        // Convertir objeto FormData a un objeto JSON
        var jsonData = {};
        var i = 0;
        jsonData["question"] = [];
        formData.forEach(function(value, key) {
          any_field_empty = (value == undefined) ? true : false;

          if (key.substring(0,6) == "option" && key.length == 7) {
            jsonData["question"][i] = value;
            i++;
          } else {
            jsonData[key] = value;
          }
        });
        //console.log(jsonData); // debug
        
  
        if ( !any_field_empty ) 
        {
          /**
           * Petición a servidor para guardar pregunta en la base de datos.
           */
          fetch(PHPapiQuestion, 
          {
              method: "PUT",
              headers: {
                  "Content-Type": "application/json",
              },
              body: JSON.stringify(jsonData),
          })
          .then(response => {
              // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
              if (!response.ok) {
                  throw new Error('Network response was not ok');
              }
              
              return response.json().text;
          })
          .then(response => {
            var feedback = document.getElementById("feedback");
              if (response == true || response == undefined) {
                feedback.setAttribute("class","true");
                feedback.innerHTML = Configfile.getFeedbackCrudQuestion().true;
                resetForm(form);
              } else if (response == "true") {
                feedback.setAttribute("class","false");
                feedback.innerHTML = Configfile.getFeedbackCrudQuestion().false;
              } else {
                feedback.setAttribute("class","error");
                feedback.innerHTML = Configfile.getFeedbackCrudQuestion().error + response;
              }
          })
          .catch(error => {
              feedback.setAttribute("class","error");
              feedback.innerHTML = Configfile.getFeedbackCrudQuestion().error + " | " + error;
          });
        } 
        else 
        {
          var feedback = document.getElementById("feedback");
          feedback.setAttribute("class","false");
          feedback.innerHTML = Configfile.getFeedbackCrudQuestion().error;
        }
        
    })

})