<?php

session_start();

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uEmail = "allain@gmail.com";
    $uPass = "123abc";

    if ($_POST['email'] == $uEmail && $_POST['password'] == $uPass) {
        //$success = "Login success!";
        $_SESSION['user_id'] = 1;
        header("Location: index.php");
        exit;
    } else {
        $error = "Error logging in!";
        $_SESSION['error'] = $error;
        header("Location: login.php");
        exit;
    }
}