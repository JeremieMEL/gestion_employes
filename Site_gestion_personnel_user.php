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
    }
    ?>

    <div class=CTAS>
        <a class="btn btn-dark btn-sm" href="form_new_worker.php"> Ajouter un salarié</a>
        <a class="btn btn-dark btn-sm" href="deconnexion.php"> Se déconnecter</a>
    </div>

    <?php
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
    $result = mysqli_query($bdd, "SELECT noemp, nom, prenom, emploi, sup, noserv, date_ajout FROM employes;");
    $sup = mysqli_query($bdd, "SELECT DISTINCT sup FROM employes WHERE sup IS NOT NULL;");
    $tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $tab2 = mysqli_fetch_all($sup, MYSQLI_ASSOC);
    //var_dump($tab2);
    ?>

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
                echo "<td hidden>" . $tab[$i]['date_ajout'] . "</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>

    <div class="content">
        <table class="table table-dark table-striped">
            <?php
            $query3 = mysqli_query($bdd, "SELECT COUNT(date_ajout) FROM employes WHERE date_ajout = DATE_FORMAT(SYSDATE(),'%Y-%m-%d');");
            $tab3 = mysqli_fetch_all($query3, MYSQLI_ASSOC);
            foreach ($tab3 as $number) {
                $resultCount[] = $number['COUNT(date_ajout)'];
            }

            echo "<td>Nombre d'ajout aujourd'hui: " . $resultCount[0] . "</td>";
            ?>
        </table>
    </div>
</body>

</html>