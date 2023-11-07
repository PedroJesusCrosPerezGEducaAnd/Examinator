<?php

require_once "helpers/Autoload.php";
$user = new User(null, "pedro", "cros", "teacher");

echo isset($user);
echo "";
echo !empty($user);

?>