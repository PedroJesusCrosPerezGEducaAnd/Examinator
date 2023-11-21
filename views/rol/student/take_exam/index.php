<?php
$thisdir = "views/rol/student/take_exam/";
echo '
<head>
    <!-- CSS - take_exam -->
    <link rel="stylesheet" href="'.$thisdir.'css/styleTakeExam.css">

    <!-- JAVASCRIPT - take_exam -->
    <script src="'.$thisdir.'js/take_exam.js"></script>
    <script src="'.$thisdir.'js/exam_functions.js"></script>
</head>
<body>

<!--<form action="" method="POST" id="form"> **TODO** -->
    <div id="exam_container"></div>
<!--</form>-->

    <div id="btn_container">
        <span id="btnBefore"><img src="http://serverpedroexaminator/views/src/icons/arrow_before512px.png" alt="Before"></span>
        <span id="btnNext"><img src="http://serverpedroexaminator/views/src/icons/arrow_next512px.png" alt="Next"></span>
    </div>
</body>
</html>
';