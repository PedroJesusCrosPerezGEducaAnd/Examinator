<?php
$thisdir = "views/rol/teacher/assign_users_exams/";
echo '
<head>
    <!-- CSS3 -->
    <link rel="stylesheet" href="'.$thisdir.'css/styleAssignExams.css">

    <!-- JAVASCRIPT -->
    <script src="'.$thisdir.'js/functions.js"></script>
    <script src="'.$thisdir.'js/upload_select_exams.js"></script>
</head>

<div id="select_exams">
    <p class="title">Selecciona examen</p>
</div>

<div id="selected_questions">
    <p class="title">Selecciona alumnos</p>
</div>

<button class="styled_btn" name="save">Save</button>
<a href="?rol=teacher&teacher=crud_exams&action=cancel" class="styled_btn" name="cancel">Cancel</a>
<p id="feedback"></p>
';
?>