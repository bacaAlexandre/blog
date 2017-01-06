<?php


class bdd
{
  public $user = "root";
  public $mdp = "";
  public $host = "localhost";
  public $dbname = "blog"


  public function connectBdd(){
    try {

      $bdd = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $mdp);
    }catch (PDOException $e){

      $e->getMessage();

    }

  }

  public function signIn($selector, $table, $conditionSelect){

    $sql = "SELECT $selector FROM $table WHERE $conditionSelect";
    $userInscription = $bdd -> query($sql) -> fetch();

    if($)
}
