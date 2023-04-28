<?php
session_start();
echo $_SESSION["user"];
unset($_SESSION["user"]);
unset($_SESSION["pswd"]);
session_destroy();
header("location:index.php");

?>