<?php

include './class/autoload.php';
spl_autoload_register('Autoload::classAutoload');


include './contents/init.php';



if (!empty($e)){
  log::writeCSV($e);

}


$perso1 = new user ("phiphi", "1234", "email@mail.com", "jean", "philibert");

// $perso1 -> inscription($bdd);
// $perso1 -> connexion($bdd);
// $perso1 -> deconnexion($bdd);
var_dump($_SESSION);
