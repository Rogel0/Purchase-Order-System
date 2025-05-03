<?php

// include('../auth/sessionCheck.php');

// Get the requested module from the URL, default to 'home'
$module = $_GET['module'] ?? 'home';
$content = "../views/admin-view/{$module}.php";

// Check if the requested module file exists
if (!file_exists($content)) {
    $content = '../views/404.php'; 
}


$title = ucfirst($module);


include('../admin-layout.php');