<?php
//variable de connexion
$user = "root";//nom d'utilisateur de labase de donnée.
$mdp = "";// Mot de passe de l'utilisateur.
$host = "localhost";// adress de la base de donnée.
$dbname = "blog";// nom de la base de donnée.

try {

  $bdd = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $mdp);
}catch (PDOException $e){

  $e->getMessage();

}

session_start();
