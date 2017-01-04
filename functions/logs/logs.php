<?php


class logs {

  public static function erreur($erreur) {
    $day = date ("d/m/y");
    $time = "[".date ("H:i:s")."]";
    $string = $day.$time.$erreur."\n";

    $handle = fopen ("./functions/logs/$day.error.text", "a");
    fwrite($handle, $string);
    fclose($handle);
  }

}
