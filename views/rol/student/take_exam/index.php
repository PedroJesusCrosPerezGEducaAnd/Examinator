<?php
$thisdir = "views/rol/student/take_exam/";
echo '
<head>
    <!-- CSS - take_exam -->
    <!--<link rel="stylesheet" href="'.$thisdir.'css/styleTakeExam.css">-->
    <link rel="stylesheet" href="'.$thisdir.'css/styleStructureTakeExam.css">

    <!-- JAVASCRIPT - take_exam -->
    <!--<script src="'.$thisdir.'js/take_exam.js"></script>-->
    <script src="'.$thisdir.'js/exam_functions.js"></script>
</head>
<body>

    <div id="exam">
        <div id="left">
            <p>5</p>
        </div>

        <div id="middle">
            <span>
                <p>Título</p>
            </span>
            <hr>
            <span>
                <p>a. <span>Option 1</span></p>
                <input type="radio" name="option">
            </span>
            <span>
                <p>b. <span>Option 2</span></p>
                <input type="radio" name="option">
            </span>
            <span>
                <p>c. <span>Option 3</span></p>
                <input type="radio" name="option">
            </span>
        </div>
        
        <div id="right">
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>9</div>
        </div>
    </div>


    <!--<div id="exam" name="examen"></div>
    <div name="btnContainer">
        <button id="btnAnterior" class="styled_take_exam_button">Before</button>
        <button id="btnSiguiente" class="styled_take_exam_button">Next</button>
    </div>-->
</body>
</html>
';