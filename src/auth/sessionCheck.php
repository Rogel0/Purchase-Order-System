<?php
session_start();

if (!isset($_SESSION['userID'])) {
    $_SESSION['error'] = 'You must log in to access this page!';
    header('Location: ../index.php');
    exit();
}
?>