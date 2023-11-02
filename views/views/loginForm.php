<!-- Login Form - START -->
<div class="form-container">

    <h2 id="h2Titulo">Login</h2>

    <form name="examinator-login" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data"
    method="post" formtarget="_blank" formnovalidate="formnovalidate">

    <!-- Login form - START -->
    <div id="login" name="login">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" autofocus maxlength="45">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="45">

        <label for="login" class="feedback" name="feedback"></label>
        <input type="submit" value="Login" name="login" id="btnLogin">
        <!--<label for="feedback" id="feedback">¡¡Tú formulario se ha enviado correctamente!!</label>-->

        <a href="helpers/router.php?menu=forgotpassword" name="aForgotPassword">¿Forgot password?</a>
        <a href="helpers/router.php?menu=signup" name="aSignUp">Create a new account</a>
    </div>
    <!-- Login form - END -->
    </form>

</div>
<!-- Login Form - END -->