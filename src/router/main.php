<?php


include('../auth/sessionCheck.php');

// Get the requested module from the URL, default to 'dashboard'
$module = $_GET['module'] ?? 'dashboard';
$content = "../views/{$module}.php";

// Check if the requested module file exists
if (!file_exists($content)) {
    $content = '../views/404.php'; 
}


$title = ucfirst($module);


include('../layout.php');

?>