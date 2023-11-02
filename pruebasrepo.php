<?php
//include_once $_SERVER["DOCUMENT_ROOT"]."/functions/showarr.php";
//include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBUser.php";
//include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBExam.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

function showUsers($users) 
{
    foreach ($users as $username => $user) {
        echo "Nombre de usuario: " . $username . "<br>";
        echo "ID: " . $user->getId() . "<br>";
        echo "Contraseña: " . $user->getPassword() . "<br>";
        echo "Rol: " . $user->getRole() . "<br><br>";
    }
}

function showUser($user) 
{
    echo "Nombre de usuario: " . $user->getName() . "<br>";
    echo "ID: " . $user->getId() . "<br>";
    echo "Contraseña: " . $user->getPassword() . "<br>";
    echo "Rol: " . $user->getRole() . "<br><br>";
    
}

/*function showExams($arr) 
{
    $length = count($arr);
    for ($i=0; $i < $length; $i++) 
    { 
        echo "ID: " . $arr[$i]->getId() . "<br>";
        echo "Date: " . $arr[$i]->getDate() . "<br>";
        echo "User_id: " . $arr[$i]->getUser_id() . "<br><br>";
    }
}*/
?>

<?php
/* echo "Users <br>";
$dbuser = new DBUser();
$users = $dbuser::findAll();
showUsers($users); */
?>

<?php
echo "Inser User <br>";
//$dbuser = new DBUser();
//$users = $dbuser::findAll();
//echo DBUser::insert(new User(null, 'aaaaaaaaa', 'hola', null)) . "<br><br>";
$user = DBUser::findByName('aaaaaaaaa2');
//showUsers($user);
echo $user . "<br><br>";
if ( isset($user) ) 
{
    echo "true";
}
else
{
    echo "false";
}
echo "<br><br>";
?>

<?/*
echo "Exams <br>";
$arr = DBExam::findAll();
showExams($arr);
*/
?>