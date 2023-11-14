<?php
$thisdir = "views/rol/teacher/crud-questions/";
echo '
<head>
    <link rel="stylesheet" href="'.$thisdir.'styleCrudQuestions.css">
</head>

<p>Create questions form</p>

<form action="" method="post">
    <!-- STATEMENT -->
    <label for="statement">Statement</label>
    <input type="text" name="statement" placeholder="write here a statement">

    <!-- OPTION 1 -->
    <label for="option1">Option 1</label>
    <input type="text" name="option1" placeholder="write here first option">
    <input type="radio" name="option" value="option1">

    <!-- OPTION 2 -->
    <label for="option2">Option 2</label>
    <input type="text" name="option2" placeholder="write here second option">
    <input type="radio" name="option" value="option2">

    <!-- OPTION 3 -->
    <label for="option3">Option 3</label>
    <input type="text" name="option3" placeholder="write here third option">
    <input type="radio" name="option" value="option3">

    <!-- DIFFICULTY -->
    <label for="difficulty">Difficulty: </label>
    <select name="difficulty" id="difficulty">
        <option value="easy">Easy</option>
        <option value="medium">Medium</option>
        <option value="difficulty">Difficult</option>
    </select>

    <!-- CATEGORY -->
    <label for="category">Category: </label>
    <select name="category" id="category">
        <option value="base-de-datos">Base de datos</option>
        <option value="programación">Programación</option>
    </select>

    <!-- SOURCE -->
    <label for="source">Source</label>
    <input type="file" name="source">

    <!-- TYPESOURCE -->
    <label for="typesource">Type: </label>
    <label for="photo">photo</label>
    <input type="radio" name="typesource" value="photo">
    <label for="video">video</label>
    <input type="radio" name="typesource" value="video">

    <!-- BUTTONS --> 
    <input type="submit" name="create" value="Create" class="styled-button">
    <input type="reset" name="reset" value="Clear" class="styled-button">
</form>
';
?>