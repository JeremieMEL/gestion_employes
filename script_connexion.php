<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Gestion personnel : connexion</title>
</head>

<body>
    <?php

    // if (!isset($_SESSION['email'])) {
    //     header('Location: form_connexion.php');
    // }

    $tab = connexion($_POST['email']);


    // for ($i = 0; $i < count($tab); $i++) {

    if (password_verify($_POST['user_password'], $tab['hash'])) {
        session_start();
        $_SESSION['email'] = $_POST['email'];

        if ($tab['status'] == 'admin') {
            header('Location: site_gestion_personnel.php');
        } else {
            header('Location: site_gestion_personnel_user.php');
        }
    } else {
        echo "<div class='fail_connexion'>
                <div><p>Mot de passe invalide</p></div>
                <div><a class='btn btn-dark btn-sm' href='form_connexion.php'>Retour</a></div>
                </div>";
    }
    // }

    // Fonction procédurale
    // function connexion($email)
    // {
    //     $bdd = mysqli_init();
    //     mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
    //     $result = mysqli_query($bdd, "SELECT hash, status FROM privileges WHERE email='$email';");
    //     $tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //     mysqli_close($bdd);
    //     return $tab;
    // }

    // Fonction Orientée Objet
    function connexion($email)
    {
        // $mysqli = new mysqli('127.0.0.1', 'root', '', 'employes_bdd');
        // $sql = "SELECT hash, status FROM privileges WHERE email='$email';";
        // $rs = $mysqli->query($sql);
        // $tab = $rs->fetch_all(MYSQLI_ASSOC);
        // return $tab;
        // $rs->free();
        // $mysqli->close();

        $mysqli = new mysqli('127.0.0.1', 'root', '', 'employes_bdd');
        $stmt = $mysqli->prepare("SELECT hash, status FROM privileges WHERE email=?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $rs = $stmt->get_result();
        $tab = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tab;
    }


    // echo "</br> Mot de pass entré par l'utilisateur hashé : " . $pass_hache;
    // echo "</br> Hashage recupéré en bdd : " . $tab[0]['hash'];
    // echo "</br> Adresse email entrée par l'utilisateur : " . $_POST['email'];
    // echo "</br> Mot de passe entré par l'utilisateur : " . $_POST['user_password'];


    // } else if ($tab[$i]['status'] == 'user') {
    //     header('Location: site_gestion_personnel_user.php');
    // } else {
    //     echo "<div class='fail_connexion'>
    //     <div><p>Vous n'avez pas les droits de consulter cette page</p></div>
    //     <div><a class='btn btn-dark btn-sm' href='form_connexion.php'> Retour</a></div>
    //     </div>";
    ?>


</body>

</html>