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

    <div class=CTA2>
        <a class="btn btn-dark btn-sm" href="form_new_worker.php"> Ajouter un salarié</a>
    </div>


    <?php
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
    $result = mysqli_query($bdd, "SELECT noemp, nom, prenom, emploi, sup, noserv FROM employes;");
    $tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($tab);
    // var_dump($tab[0]);
    //var_dump($tab[0]["nom"]);
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
            for ($i = 0; $i < count($tab); $i++) {
                $nom = $tab[0]['nom'];

                echo "<tr>";
                echo "<td hidden>" . $tab[$i]['noemp'] . "</td>";
                echo "<td>" . $tab[$i]['nom'] . "</td>";
                echo "<td>" . $tab[$i]['prenom'] . "</td>";
                echo "<td>" . $tab[$i]['emploi'] . "</td>";
                echo "<td>" . $tab[$i]['sup'] . "</td>";
                echo "<td>" . $tab[$i]['noserv'] . "</td>";
                echo "<td><a href='detail.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Detail</button></a></td>";
                echo "<td><a href='form_modification.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Modifier</button></a></td>";
                echo "<td><a href='supprimer.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Supprimer</button></a></td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>

</body>

</html>