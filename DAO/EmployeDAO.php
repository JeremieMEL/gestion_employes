<?php

include_once(__DIR__ . "/../Model/Employe.php");
include_once("CommonDAO.php");

class EmployeDAO extends CommonDAO
{

    function updateBdd($nom, $prenom, $emploi, $sup, $sal, $comm, $noserv, $noemp)
    {
        // $mysqli = new mysqli('127.0.0.1', 'root', '', 'employes_bdd');
        // $mysqli = parent::connexion();
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("UPDATE employes SET nom=?, prenom=?, emploi=?, sup=?, sal=?, comm=?, noserv=? WHERE noemp=?;");
        $stmt->bind_param("sssiddii", $nom, $prenom, $emploi, $sup, $sal, $comm, $noserv, $noemp);
        $stmt->execute();
        $mysqli->close();
    }

    function Ajout_Employe($nom, $prenom, $emploi, $sup, $sal, $comm, $noServ)
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("INSERT INTO employes (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv, date_ajout)
        SELECT MAX(noemp)+1, ?, ?, ?, ?, sysdate(), ?, ?, ?, sysdate() FROM employes;");
        $stmt->bind_param("sssidii", $nom, $prenom,  $emploi,  $sup,  $sal, $comm, $noServ);
        $stmt->execute();
        $mysqli->close();
    }

    function detail($id)
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("SELECT noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv FROM employes WHERE noemp=?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $rs = $stmt->get_result();
        $tab = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tab;
    }

    function modifierEmploye($id)
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("SELECT noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv FROM employes WHERE noemp=?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $rs = $stmt->get_result();
        $tab = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tab;
    }

    function connexion($email)
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("SELECT hash, status FROM privileges WHERE email=?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $rs = $stmt->get_result();
        $tab = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tab;
    }

    function selectAll()
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("SELECT noemp, nom, prenom, emploi, sup, noserv, date_ajout FROM employes;");
        $stmt->execute();
        $rs = $stmt->get_result();
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tab;
    }

    function selectSup()
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("SELECT DISTINCT sup FROM employes WHERE sup IS NOT NULL;");
        $stmt->execute();
        $rs = $stmt->get_result();
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tab;
    }

    function deleteEmploye($id)
    {
        $mysqli = $this->connexionBDD();
        $stmt = $mysqli->prepare("DELETE FROM employes WHERE noemp=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $mysqli->close();
    }

    function countAdding()
    {
        $mysqli = $this->connexionBDD();
        $query3 = mysqli_query($mysqli, "SELECT (date_ajout) FROM employes WHERE date_ajout = DATE_FORMAT(SYSDATE(),'%Y-%m-%d');");
        $tab3 = mysqli_num_rows($query3);
        return $tab3;
    }
}
