

<!-- Signup Form - START -->
<div class="form-container">

    <h2 id="h2Titulo">Sign up</h2>

    <form name="signupForm" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data"
    method="post" formtarget="_blank" formnovalidate="formnovalidate">

    <!-- Signup form - START -->
    <div name="signup">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" autofocus maxlength="45">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="45">

        <label for="signup" class="feedback" name="feedback"></label>
        <input type="submit" value="Sign up" name="signup" id="btnSignup">
        <!--<label for="feedback" id="feedback">¡¡Tú formulario se ha enviado correctamente!!</label>-->

        <a href="?menu=signup" name="aSignup">¿Have account? Signup</a>
        <a href="?menu=landingpage" name="aMain">Main</a>
    </div>
    <!-- Signup form - END -->

</div>
<!-- Signup Form - END -->


    <script src="views/js/ajax_copy.js"></script>
