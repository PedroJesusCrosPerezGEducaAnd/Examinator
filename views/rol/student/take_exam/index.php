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
        <button id="btnAnterior">Before</button>
        <button id="btnSiguiente">Next</button>
    </div>
</body>
</html>
';