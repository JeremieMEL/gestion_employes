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
        deleteEmploye($_GET['id']);
        header('Location: site_gestion_personnel.php');
    }

    function deleteEmploye($id)
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
        $insert = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$id';");
        mysqli_close($bdd);
    }


    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    } else {
        header('Location: site_gestion_personnel.php');
    }


    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
    $insert = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$_GET[id]';");







    ?>


</body>

</html>