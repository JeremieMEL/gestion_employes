<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mystyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Gestion personnel : se connecter</title>
</head>

<body>

    <?php

    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    }

    $hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
    $insert = mysqli_query($bdd, "INSERT INTO privileges (id, password, email, hash)
    SELECT MAX(id)+1, " . "'" . $_POST['user_password'] . "', '" . $_POST['email'] . "', '" . $hash .  "' FROM privileges;");

    echo "<div class='insert_account'>
                    <div><p>Votre compte a été créé avec succès.</p></div>
                    <div><a class='btn btn-dark btn-sm' href='form_connexion.php'>Se connecter</a></div>
                    </div>";

    ?>

</body>

</html>