<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
    <title>Document</title>
</head>

<body>

    <?php
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "employes_bdd");
    $result = mysqli_query($bdd, "SELECT noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv FROM employes WHERE noemp='$_GET[id]';");
    $tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($tab);
    ?>

    <form action="ajouter_modification.php" method="post">
        <div class="form">
            <legend>Entrez vos informations</legend>

            <div class=" mb-3">
                <label for="noemp" class="form-label">Numéro employé :</label>
                <input type="text" class="form-control" id="noemp" name="noemp" value="<?php echo $tab[0]['noemp'] ?>">
            </div>
            <div class=" mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $tab[0]['nom'] ?>">
            </div>
            <div class=" mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $tab[0]['prenom'] ?>">
            </div>
            <div class=" mb-3">
                <label for="emploi" class="form-label">Emploi :</label>
                <input type="text" class="form-control" id="emploi" name="emploi" value="<?php echo $tab[0]['emploi'] ?>">
            </div>
            <div class="mb-3">
                <label for="sup" class="form-label">Numéro du supérieur :</label>
                <input type="text" class="form-control" id="sup" name="sup" value="<?php echo $tab[0]['sup'] ?>">
            </div>
            <div class="mb-3">
                <label for="embauche" class="form-label">Date Embauche :</label>
                <input disabled="disabled" type="text" class="form-control" id="embauche" name="embauche" value="<?php echo $tab[0]['embauche'] ?>">
            </div>
            <div class="mb-3">
                <label for="sal" class="form-label">Salaire :</label>
                <input type="text" class="form-control" id="sal" name="sal" value="<?php echo $tab[0]['sal'] ?>">
            </div>
            <div class="mb-3">
                <label for="comm" class="form-label">Commission :</label>
                <input type="text" class="form-control" id="comm" name="comm" value="<?php echo $tab[0]['comm'] ?>">
            </div>
            <div class="mb-3">
                <label for="noserv" class="form-label">Numéro de votre service :</label>
                <input type="text" class="form-control" id="noserv" name="noserv" value="<?php echo $tab[0]['noserv'] ?>">
            </div>
            <div>
                </pan><button type="submit" class="btn btn-dark">Envoyer</button>
            </div>
        </div>
    </form>




    <div class=CTA>
        <a class="btn btn-dark btn-sm" href="Site_gestion_personnel.php"> Revenir à la liste des employés</a>
    </div>
</body>

</html>