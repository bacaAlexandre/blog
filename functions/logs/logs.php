<?php

//crréation de la classe
class logs {

  public $day;
  public $time;
  public $string;
  
  public static function erreur($erreur) {
    $day = date ("d.m.y");// varaible pour le jour/mois/année
    $time = "[".date ("H:i:s")."]";//variable pour l'heure
    $string = $time."\n".$erreur."\n\n";// variable de l'heure + erreur
    //creation si il n'existe pas et ouverture du fichier
    $handle = fopen ("./functions/logs/erreur/".$day.".txt", "a");
    //ecriture de l'erreur dans le fichier ouvert
    fwrite($handle, $string);
    //fermeture du fichier
    fclose($handle);

  }

}
