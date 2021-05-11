<?php
include(__DIR__ . './DAO/EmployeDAO.php');
header('Location: site_gestion_personnel.php');
$employeDAO = new EmployeDAO();
$tab = $employeDAO->updateBdd($_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['sup'], $_POST['sal'], $_POST['comm'], $_POST['noserv'], $_POST['noemp']);
