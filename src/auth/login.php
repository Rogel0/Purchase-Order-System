<?php
session_start();
include('../database/connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tblUsers WHERE email = ? AND password = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {
    if ($user['role'] === 'admin') {
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['successLogin'] = 'You have successfully logged in!';
        header('Location: ../router/admin-main.php?module=admin-home');
    } elseif ($user['role'] === 'user') {
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['successLogin'] = 'You have successfully logged in!';
        header('Location: ../router/main.php?module=home');
    }
    exit();
} else {
    $_SESSION['error'] = 'Invalid username or password!';
    header('Location: ../index.php');
    exit();
}
