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
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    }
    ?>

    <form action="ajouter.php" method="post">
        <div class="form">
            <legend>Entrez vos informations</legend>


            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="prenom" placeholder="Votre Nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="nom" placeholder="Votre Prénom" required>
            </div>
            <div class="mb-3">
                <label for="emploi" class="form-label">Emploi :</label>
                <input type="text" class="form-control" id="emploi" name="emploi" placeholder="Votre emploi" required>
            </div>
            <div class="mb-3">
                <label for="sup" class="form-label">Numéro du supérieur :</label>
                <input type="text" class="form-control" id="sup" name="sup" placeholder="Numéro du supérieur" required>
            </div>
            <div class="mb-3">
                <label for="sal" class="form-label">Salaire :</label>
                <input type="text" class="form-control" id="sal" name="sal" placeholder="Votre salaire" required>
            </div>
            <div class="mb-3">
                <label for="comm" class="form-label">Commission :</label>
                <input type="text" class="form-control" id="comm" name="comm" placeholder="Votre Commission" required>
            </div>
            <div class="mb-3">
                <label for="noserv" class="form-label">Numéro de votre service :</label>
                <input type="text" class="form-control" id="noserv" name="noserv" placeholder="Votre Numéro de service" required>
            </div>
            <div>
                </pan><button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
    </div>
    </div>
    </form>

    <div class=CTA>
        <a class="btn btn-dark btn-sm" href="Site_gestion_personnel.php"> Revenir à la liste des employés</a>
    </div>
</body>

</html>