<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

// PRUEBA INSERT
/*$response = DBQuestion::insert(new Question(null, "Este es el enunciado", array("futuro questions JSON2","hola"), "futuro source JSON2", null, 1, 1));

echo $response == true ? "true" : "false";*/


// PRUEBA SELECT *
$response = DBQuestion::findAll();

//echo $response == true ? "true" : "false";

// Itera sobre el array y muestra la información de cada pregunta
foreach ($response as $questionId => $question) {
    echo "ID: " . $question->get_id() . "<br>";
    echo "Statement: " . $question->getStatement() . "<br>";
    echo "Question: " . var_dump($question->getQuestion()) . "<br>";
    echo "Option: " . $question->getOption() . "<br>";
    echo "Source: " . $question->getSource() . "<br>";
    echo "Exam ID: " . $question->getExam_id() . "<br>";
    echo "Difficulty ID: " . $question->getDifficulty_id() . "<br>";
    echo "Category ID: " . $question->getCategory_id() . "<br>";
    echo "<hr>";
}

/*echo "<hr>";
var_dump($response[15]->getQuestion());

echo "<hr>".$response[15]->getQuestion()[2];*/
/*$json = json_encode(["option1", "option2", "option3"]);
var_dump(json_decode(json_decode($json)));*/


?>