<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DB.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBUser.php";

echo DBUser::update("password","holahola","name","actualizabien")

?>