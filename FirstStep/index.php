<?php
session_start();
include('./includes/config.inc.php');

$page = isset($_GET['page']) ? $_GET['page'] : '/';

if ($page == 'logout') {
    include('./logicals/logout.php');
    exit; // Ensure the script stops after including logout.php
} elseif ($page == 'gallery' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    include('./logicals/gallery.php'); // Include the gallery logic for handling file upload
} elseif ($page == 'registration') {
    include('./logicals/registration.php'); // Include the registration logic
    $find = $pages['register']; // Display the registration template after processing
} elseif (isset($pages[$page]) && file_exists("./templates/pages/{$pages[$page]['file']}.tpl.php")) {
    $find = $pages[$page];
} elseif ($page == 'contact_submit' && file_exists("./logicals/contact_submit.php")) {
    include('./logicals/contact_submit.php');
    exit; // Ensure the script stops after including contact_submit.php
} else {
    $find = $error_page;
    header("HTTP/1.0 404 Not Found");
}

include('./templates/index.tpl.php');
?>
