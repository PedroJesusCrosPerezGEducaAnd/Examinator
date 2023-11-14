<?php

if ( Login::isLoged() ) 
{
    echo '
    <div>
        <span><img src="views/src/icons/logo_examinator.png" alt="logotipo" name="logo"></span>
    </div>

    <nav class="dropdown">
        <!--<a href="?menu=landingpage" class="btn">Landingpage</a>
        <div>-->
        <a href="?myAccount" class="dropbtn"><img src="views/src/icons/userLoged.svg" alt="loged-user-icon" name="userIcon"></a>
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