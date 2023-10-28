<?php
    /**
     * Libraries
     */
    require_once $_SERVER['DOCUMENT_ROOT']."/db/dataBase.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/forms/formsFunctions/commonFunctions.php";
?>

<?php
    function createMainForm($msg)
    {
        //$currentCredential = readCurrentUser('sources/db/currentUser.csv'); // TODO
        $currentCredential = readCurrentUser('../sources/db/currentUser.csv');
        session_start();
        $_SESSION['user'] = $_POST['user'];
        $currentUser = $_SESSION['user'];
        $errorId = '';
        $errorNombre = '';
        $id = $nombre = "";

        echo '
            <form action="../functions/controler.php" method="post" name="formulario Pedro">

            <label id="currentUser">USER: '.$currentUser/*$currentCredential[0]*/.'</label>
            <br>
            <br>
            <label for="id">Id: </label>
        ';
        creaInput("id",$id);
        echo '<br>';
        createMsg($errorId);
        echo '
            <br>
            <label for="nombre">Nombre: </label>
        ';
        creaInput("nombre",$nombre);
        echo '<br>';
        createMsg($errorNombre);
        echo '<br>';
        createMsg($msg);
        echo'
            <br>
            <input type="submit" value="New" name="new">
            <input type="submit" value="Edit" name="edit">
            <input type="submit" value="Delete" name="delete">
            <input type="submit" value="Listados" name="listados">
            <input type="submit" value="Log out" name="logout">

            </form>
        ';
    }

?>