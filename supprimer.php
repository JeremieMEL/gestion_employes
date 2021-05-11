<?php
header('Location: site_gestion_personnel.php');
include(__DIR__ . './DAO/EmployeDAO.php');
$employeDAO = new EmployeDAO();
$tab = $employeDAO->deleteEmploye($_GET['id']);
