<?php
include('../database/connection.php');
session_start();
session_destroy();
session_start();
$_SESSION['errorLogin'] = 'You have successfully logged out!';
header('Location: ../index.php');
exit;
?>