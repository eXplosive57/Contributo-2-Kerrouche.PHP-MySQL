<?php

session_start();

$_SESSION = array();

session_destroy();

header("location: accesso.php");
exit;


?>