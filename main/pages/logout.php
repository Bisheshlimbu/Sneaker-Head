<?php
session_start();

session_unset();
session_destroy();
header("Location: http://sneaker-head.local/main/pages/login.php");
exit();
?>
