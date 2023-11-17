<?php
$thisdir = "views/rol/student/take_exam/";
echo '
<head>
    <!-- CSS - take_exam -->
    <link rel="stylesheet" href="'.$thisdir.'css/styleTakeExam.css">

    <!-- JAVASCRIPT - take_exam -->
    <script src="'.$thisdir.'js/take_exam.js"></script>
</head>
<body>

    <div id="exam" name="examen"></div>
    <div name="btnContainer">
        <button id="btnAnterior" class="styled_take_exam_button">Before</button>
        <button id="btnSiguiente" class="styled_take_exam_button">Next</button>
    </div>
</body>
</html>
';