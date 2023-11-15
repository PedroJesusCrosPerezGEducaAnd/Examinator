<?php
$thisdir = "views/rol/teacher/crud_questions/";
echo '
<head>
    <!-- CSS - users_request -->
    <link rel="stylesheet" href="'.$thisdir.'css/styleCrudQuestions.css">

    <!-- JAVASCRIPT - users_request -->
    <script src="'.$thisdir.'js/teacher_ajax.js"></script>
    <script src="'.$thisdir.'js/Form.js"></script>
</head>

<div name="crud_questions">
    <p class="formTitle">Create questions form</p>

    <form action="" method="post" name="crud_questions">
        <!-- STATEMENT -->
        <label for="statement">Statement</label>
        <input type="text" name="statement" placeholder="write here a statement">

        <!-- OPTION 1 -->
        <label for="option1">Option 1</label>
        <input type="text" name="option1" placeholder="write here first option"autofocus>
        <input type="radio" name="option" value="1">

        <!-- OPTION 2 -->
        <label for="option2">Option 2</label>
        <input type="text" name="option2" placeholder="write here second option">
        <input type="radio" name="option" value="2">

        <!-- OPTION 3 -->
        <label for="option3">Option 3</label>
        <input type="text" name="option3" placeholder="write here third option">
        <input type="radio" name="option" value="3">

        <!-- DIFFICULTY -->
        <label for="difficulty_id">Difficulty: </label>
        <select name="difficulty_id" id="difficulty">
            <option value="1">Easy</option>
            <option value="2">Medium</option>
            <option value="3">Difficult</option>
        </select>

        <!-- CATEGORY -->
        <label for="category_id">Category: </label>
        <select name="category_id" id="category">
            <option value="1">Sistemas informáticos</option>
            <option value="5">Base de datos</option>
            <option value="8">Programación</option>
        </select>

        <!-- SOURCE -->
        <label for="source">Source</label>
        <input type="file" name="source" disabled>

        <!-- TYPESOURCE -->
        <label for="typesource">Type: </label>
        <label for="photo">photo</label>
        <input type="radio" name="typesource" value="photo" disabled>
        <label for="video">video</label>
        <input type="radio" name="typesource" value="video" disabled>

        <!-- BUTTONS --> 
        <input type="submit" name="create" value="Create" class="styled-button">
        <input type="reset" name="reset" value="Clear" class="styled-button">
    </form>
    <p id="feedback"></p>
</div>
';
?>