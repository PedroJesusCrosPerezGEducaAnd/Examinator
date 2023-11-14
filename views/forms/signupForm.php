<?php
$thisdir = "views/forms";
?>
<head>
    <link rel="stylesheet" href="<?php echo $thisdir?>/css/styleForm.css">
</head>

<!-- Signup Form - START -->
<div class="form-container">

    <h2 id="h2Titulo">Sign up</h2>

    <form name="examinator-login" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data"
    method="post" formtarget="_blank" formnovalidate="formnovalidate" action="?menu=actionSignup">

    <!-- Signup form - START -->
    <div name="examinatorForm">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" autofocus maxlength="45">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="45">

        <label for="signup" class="feedback" name="feedback"></label>
        <input type="submit" value="Sign up" name="signup" id="btnSignup">

        <a href="?menu=login" name="aSignup">¿Have account? <br> -> Login</a>
    </div>
    <!-- Signup form - END -->

</div>
<!-- Signup Form - END -->


    <!--<script src="views/js/ajax_copy.js"></script>-->
