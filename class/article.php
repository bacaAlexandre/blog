<?php



class Article {

  public $id;
  public $titre;
  public $contenu;
  public $chapo;
  public $date;
  public $user_id;
  // public $commentaire;


  public function __construct($titre, $contenu, $chapo, $date, $user_id){
    $this -> titre = $titre;
    $this -> contenu = $contenu;
    $this -> chapo = $chapo;
    $this -> date = $date;
    $this -> user_id = $user_id;
  }
  public function writeArticle($bdd) {
    $date = new DateTime();
    $date -> setTimezone(new DateTimeZone('Europe/Paris'));
    $sql = $bdd->prepare("INSERT INTO article (titre, contenu, date, chapo, user_id)
    VALUES (:titre, :contenu, :date, :chapo, :user_id)");
    $sql->execute(array(
      ":titre" => $this -> titre,
      ":contenu" => $this -> contenu,
      ":date" => $date -> format('Y-m-d h:i:s'),
      ":chapo" => $this -> chapo,
      ":user_id" => $this -> user_id,
    ));
    var_dump($sql);
  }

  public function updateArticle() {

  }

  public function deleteArticle() {

  }
}
