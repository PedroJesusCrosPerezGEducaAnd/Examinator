<?php
include_once "repository/DBexam.php";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "PHP") 
{
    $json = json_encode(findAll());

    echo $json;
}



?>