<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
    <title>BDD personnel</title>
</head>

<body>


    <?php

    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    } else {
        updateBdd($_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['sup'], $_POST['sal'], $_POST['comm'], $_POST['noserv'], $_POST['noemp']);
        header('Location: site_gestion_personnel.php');
    }


    function updateBdd($nom, $prenom, $emploi, $sup, $sal, $comm, $noserv, $noemp)
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
        $insert = mysqli_query($bdd, "UPDATE employes SET nom='$nom', prenom='$prenom', emploi='$emploi', sup='$sup', sal='$sal', comm='$comm', noserv='$noserv' WHERE noemp='$noemp';");
        mysqli_close($bdd);
    }
    ?>

</body>

</html>