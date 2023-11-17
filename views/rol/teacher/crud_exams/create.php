<?php
$thisdir = "views/rol/teacher/crud_exams/";
echo '
<head>
    <!-- CSS3 -->
    <link rel="stylesheet" href="'.$thisdir.'css/styleCrudExams.css">
    <!--<link rel="stylesheet" href="'.$thisdir.'css/styleCrudExamsv2.css">-->

    <!-- JAVASCRIPT -->
    <script src="'.$thisdir.'js/functions.js"></script>
    <script src="'.$thisdir.'js/upload_select_questions.js"></script>
</head>

<div id="select_questions">
    <p class="title">Selecciona preguntas</p>
</div>

<div id="selected_questions">
    <p class="title">Preguntas seleccionadas</p>
</div>

<button class="styled_btn" name="save">Save</button>
<a href="?rol=teacher&teacher=crud_exams&action=cancel" class="styled_btn" name="cancel">Cancel</a>
<p id="feedback"></p>
';
?>