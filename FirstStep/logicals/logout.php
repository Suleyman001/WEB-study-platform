<?php
session_start();

$data = [
    'fn' => isset($_SESSION['fn']) ? $_SESSION['fn'] : null,
    'ln' => isset($_SESSION['ln']) ? $_SESSION['ln'] : null,
    'user' => isset($_SESSION['user']) ? $_SESSION['user'] : null
];

unset($_SESSION["fn"]);
unset($_SESSION["ln"]);
unset($_SESSION["user"]);

session_destroy();

// Redirect to home page after logout
header('Location: ./');
exit;
?>
