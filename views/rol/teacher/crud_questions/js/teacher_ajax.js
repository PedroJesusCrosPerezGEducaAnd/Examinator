window.addEventListener("click", function () {

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
  
        // Convertir FormData a un objeto JSON
        var jsonData = {};
        formData.forEach(function(value, key) {
          jsonData[key] = value;
        });
  
        // Imprimir el objeto JSON en la consola
        console.log(jsonData);

        //var formData = new FormData(form);
        //console.log(formData.data);

        /**
         * Guardar pregunta en el servidor.
         */
        /*fetch(PHPapiUsersRequests, 
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: formData,
        })
        .then(response => {
            // Verificar si la respuesta está en el rango de códigos de éxito (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(jsonData => {
            var table = document.getElementById("tRequestUsers");
            var tbody = table.getElementsByTagName("tbody")[0];
            uploadTable(jsonData, tbody);
        })
        .catch(error => {
            console.error('Error during fetch operation:', error);
        });*/
    })

})