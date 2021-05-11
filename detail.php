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
    <link rel="stylesheet" href="./css/mystyle.css">
    <title>BDD personnel</title>
</head>

<body>

    <?php
    include(__DIR__ . './DAO/EmployeDAO.php');

    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    }


    $employeDAO = new EmployeDAO();
    $tab = $employeDAO->detail($_GET['id']);

    ?>

    <div class="content">
        <table class="table table-dark table-striped">

            <tr>
                <th>N° Employé</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Emploi</th>
                <th>Superieur</th>
                <th>Date embauche</th>
                <th>Salaire</th>
                <th>Commission</th>
                <th>N° service</th>
            </tr>


            <?php
            echo "<tr>";
            echo "<td>" . $tab['noemp'] . "</td>";
            echo "<td>" . $tab['nom'] . "</td>";
            echo "<td>" . $tab['prenom'] . "</td>";
            echo "<td>" . $tab['emploi'] . "</td>";
            echo "<td>" . $tab['sup'] . "</td>";
            echo "<td>" . $tab['embauche'] . "</td>";
            echo "<td>" . $tab['sal'] . "</td>";
            echo "<td>" . $tab['comm'] . "</td>";
            echo "<td>" . $tab['noserv'] . "</td>";
            echo "<td><a href='form_modification.php?id=" . $tab['noemp'] . "'><button class='btn btn-warning'>Modifier</button></a></td>";
            echo "<td><a href='supprimer.php?id=" . $tab['noemp'] . "'><button class='btn btn-warning'>Supprimer</button></a></td>";
            echo "</tr>";
            ?>

        </table>
    </div>

    <div class=CTA2>
        <a class="btn btn-dark btn-sm" href="Site_gestion_personnel.php"> Revenir à la liste</a>
    </div>

</body>

</html>