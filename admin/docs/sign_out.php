<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['password']);
session_unset();
session_destroy();
header( "Location:../../login/index.php" );

?>