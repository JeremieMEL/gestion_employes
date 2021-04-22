<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: form_connexion.php');
}

unset($_SESSION);
unset($_COOKIE);
session_destroy();
header('form_connexion.php');
