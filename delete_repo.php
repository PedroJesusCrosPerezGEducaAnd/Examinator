<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/helpers/Autoload.php';

    $arr = [6,30];
    echo DBExam_has_question::delete_array_id($arr);
    echo "<hr>";
    echo DBQuestion::delete_array_id($arr);
    echo "<hr>";

?>