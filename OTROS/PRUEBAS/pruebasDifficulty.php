<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

/*echo DBDifficulty::findByDifficulty_id(2);
echo "<hr>";
echo DBDifficulty::findByDifficulty_id(3);
echo "<hr>";
echo DBCategory::findByCategory_id(8);
echo "<hr>";
echo DBCategory::findByCategory_id(18);
echo "<hr>";
echo "<hr>";
echo DBExam_has_question::findByExam_id( 4 );
$exam = DBExam_has_question::findByExam_id( 4 );
var_dump( $exam );
echo "<hr>";
echo "<hr>";
echo $exam->getStatement();*/

try {
    $exam_id = 4; // Reemplaza con el exam_id que desees
    $exam = DBExam_has_question::findByExam_id($exam_id);

    if ($exam) {
        foreach ($exam->getArrayQuestion() as $question) {
            if ($question instanceof Questionjs) {
                echo "Question ID: " . $question->getId() . "<br>";
                echo "Statement: " . $question->getStatement() . "<br>";
                echo "Question: " . json_encode($question->getQuestion()) . "<br>";
                echo "Difficulty ID: " . $question->getDifficulty()->getId() . "<br>";
                echo "Difficulty Level: " . $question->getDifficulty()->getLevel() . "<br>";
                echo "Category ID: " . $question->getCategory()->getId() . "<br>";
                echo "Category Name: " . $question->getCategory()->getName() . "<br>";
                echo "------------------------<br>";
            } else {
                echo "Error: No se pudo obtener la pregunta correctamente.<br>";
            }
        }
    } else {
        echo "No se encontraron preguntas para el examen con ID $exam_id.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}




?>