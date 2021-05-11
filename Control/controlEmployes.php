<?php
include_once(__DIR__ . "/../presentation/affichage_commun.php");
include_once(__DIR__ . "/../DAO/EmployeDAO.php");

function afficherEmployes()
{
    include_once(__DIR__ . "/../DAO/EmployeDAO.php");
    $employeDAO = new EmployeDAO();
    $employeDAO->selectAll();
    // $employeDAO->selectSup();
    // $employeDAO->countAdding();
    return $employeDAO;
}

afficherHeadHtml();
$employeDAO = new EmployeDAO();
$count = $employeDAO->countAdding();
afficherCount($count);
afficherEmployes();

$employeDAO = new EmployeDAO();
$tab = $employeDAO->selectAll();
$tab2 = $employeDAO->selectSup();
echo "<div class='content'>
    <table class='table table-dark table-striped'>

        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Emploi</th>
            <th>Superieur</th>
            <th>N° service</th>
        </tr>";
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
