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
    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    }
    ?>

    <div class=CTAS>
        <a class="btn btn-dark btn-sm" href="form_new_worker.php"> Ajouter un salarié</a>
        <a class="btn btn-dark btn-sm" href="deconnexion.php"> Se déconnecter</a>
    </div>

    <div class="content">
        <table class="table table-dark table-striped">

            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Emploi</th>
                <th>Superieur</th>
                <th>N° service</th>
            </tr>


            <?php
            include(__DIR__ . './DAO/EmployeDAO.php');

            $employeDAO = new EmployeDAO();
            $tab = $employeDAO->selectAll();
            $tab2 = $employeDAO->selectSup();

            foreach ($tab2 as $valeur) {
                $tabSup[] = $valeur["sup"];
            }
            for ($i = 0; $i < count($tab); $i++) {

                echo "<tr>";
                echo "<td hidden>" . $tab[$i]['noemp'] . "</td>";
                echo "<td>" . $tab[$i]['nom'] . "</td>";
                echo "<td>" . $tab[$i]['prenom'] . "</td>";
                echo "<td>" . $tab[$i]['emploi'] . "</td>";
                echo "<td>" . $tab[$i]['sup'] . "</td>";
                echo "<td>" . $tab[$i]['noserv'] . "</td>";
                echo "<td><a href='detail.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Detail</button></a></td>";
                echo "<td><a href='form_modification.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Modifier</button></a></td>";
                if (in_array($tab[$i]['noemp'], $tabSup)) {
                    echo "<td></td>";
                } else {
                    echo "<td><a href='supprimer.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Supprimer</button></a></td>";
                }
                echo "<td hidden>" . $tab[$i]['date_ajout'] . "</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>

    <div class="content">
        <table class="table table-dark table-striped">
            <?php
            echo "<td>Nombre d'ajout aujourd'hui: " . $employeDAO->countAdding() . "</td>";
            ?>
        </table>
    </div>
</body>

</html>