<?php
include('../database/connection.php');
session_start();
session_destroy();
session_start();
$_SESSION['error'] = 'You have successfully logged out!';
header('Location: ../index.php');
exit;
?>