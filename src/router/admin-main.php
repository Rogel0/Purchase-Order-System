<?php

// include('../auth/sessionCheck.php'); // Centralized session validation

// Get the requested module from the URL, default to 'home'
$module = $_GET['module'] ?? 'home';
$content = "../views/admin-views{$module}.php";

// Check if the requested module file exists
if (!file_exists($content)) {
    $content = '../views/404.php'; // Fallback to a 404 page
}

// Set the page title dynamically
$title = ucfirst($module);

// Include the layout file, which will load the header, sidebar, and the dynamic content
include('../admin-layout.php');