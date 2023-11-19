<?php

if ( Login::isLoged() ) 
{
    $userName = Session::read("user")->getName();
    echo '
    <style> header>* {width: auto;} </style>
    <div>
        <span><img src="views/src/icons/logo_examinator.png" alt="logotipo" name="logo"></span>
    </div>

    <nav class="dropdown">
        <!--<a href="?menu=landingpage" class="btn">Landingpage</a>
        <div>-->
        <a href="?myAccount" class="dropbtn"><img src="views/src/icons/userLoged.svg" alt="loged-user-icon" name="userIcon"></a>
        <p>'.$userName.'</p>
            <div class="dropdown-content">
                <a href="?menu=myAccount" class="dropbtn">My account</a>
                <a href="?menu=logout" class="dropbtn">Logout</a>
            </div>
        <!--</div>-->
    </nav>
    ';
}
else
{
    echo '
    <div>
        <span><img src="views/src/icons/logo_examinator.png" alt="logotipo" name="logo"></span>
        <h1>¡¡¡Bienvenido a la web Examinator!!!</h1>
    </div>

    <nav class="dropdown">
        <!--<a href="?menu=landingpage" class="btn">Landingpage</a>
        <div>-->
        <a href="?myAccount" class="dropbtn"><img src="views/src/icons/userNotLoged.svg" alt="loged-user-icon" name="userIcon"></a>
            <div class="dropdown-content">
                <a href="?menu=login" class="dropbtn">Login</a>
                <a href="?menu=signup" class="dropbtn">Signup</a>
            </div>
        <!--</div>-->
    </nav>
    ';
}

?>