<?php

include './class/autoload.php';
spl_autoload_register('Autoload::classAutoload');


include './contents/init.php';



if (!empty($e)){
  log::writeCSV($e);

}


$perso1 = new user ("phiphi", "1234", "email@mail.com", "jean", "philibert");


//$perso1 -> signIn($bdd);
$perso1 -> connect($bdd);
// $perso1 -> disconnect($bdd);
var_dump($_SESSION);


$article1 = new article ("titre", "contenu", "0", "blabla", $_SESSION['user']['userId']);
// $article1 -> writeArticle($bdd);
// $article1 -> showArticle($bdd);
// $article1 -> deleteArticle($bdd);
