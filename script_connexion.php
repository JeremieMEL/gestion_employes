<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mystyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Gestion personnel : connexion</title>
</head>

<body>
    <?php
    include_once(__DIR__ . './DAO/EmployeDAO.php');

    $email = $_POST['email'];
    $employeDAO = new EmployeDAO();
    $tab = $employeDAO->connexion($email);
    //$tab = connexion($_POST['email']);


    //for ($i = 0; $i < count($tab); $i++) {

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
                <div><p>Utilisateur inconnu où mot de passe invalide</p></div>
                <div><a class='btn btn-dark btn-sm' href='form_connexion.php'>Retour</a></div>
                </div>";
    }
    //}

    ?>


</body>

</html>