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
    <title>Document</title>
</head>

<body>
    <?php
    include(__DIR__ . './DAO/EmployeDAO.php');

    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    }

    $employeDAO = new EmployeDAO();
    $tab = $employeDAO->modifierEmploye($_GET['id']);

    ?>

    <form action="ajouter_modification.php" method="post">
        <div class="form">
            <legend>Entrez vos informations</legend>

            <div class=" mb-3">
                <label for="noemp" class="form-label">Numéro employé :</label>
                <input type="text" class="form-control" id="noemp" name="noemp" value="<?php echo $tab['noemp'] ?>">
            </div>
            <div class=" mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $tab['nom'] ?>">
            </div>
            <div class=" mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $tab['prenom'] ?>">
            </div>
            <div class=" mb-3">
                <label for="emploi" class="form-label">Emploi :</label>
                <input type="text" class="form-control" id="emploi" name="emploi" value="<?php echo $tab['emploi'] ?>">
            </div>
            <div class="mb-3">
                <label for="sup" class="form-label">Numéro du supérieur :</label>
                <input type="text" class="form-control" id="sup" name="sup" value="<?php echo $tab['sup'] ?>">
            </div>
            <div class="mb-3">
                <label for="embauche" class="form-label">Date Embauche :</label>
                <input disabled="disabled" type="text" class="form-control" id="embauche" name="embauche" value="<?php echo $tab['embauche'] ?>">
            </div>
            <div class="mb-3">
                <label for="sal" class="form-label">Salaire :</label>
                <input type="text" class="form-control" id="sal" name="sal" value="<?php echo $tab['sal'] ?>">
            </div>
            <div class="mb-3">
                <label for="comm" class="form-label">Commission :</label>
                <input type="text" class="form-control" id="comm" name="comm" value="<?php echo $tab['comm'] ?>">
            </div>
            <div class="mb-3">
                <label for="noserv" class="form-label">Numéro de votre service :</label>
                <input type="text" class="form-control" id="noserv" name="noserv" value="<?php echo $tab['noserv'] ?>">
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