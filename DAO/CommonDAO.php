<?php

include_once(__DIR__ . "/../Model/Employe.php");

class CommonDAO
{
    protected function connexionBDD()
    {
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'employes_bdd');
        return $mysqli;
    }
}
