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
    $whrite = $bdd->prepare("INSERT INTO article (titre, contenu, date, chapo, user_id)
    VALUES (:titre, :contenu, :date, :chapo, :user_id)");
    $whrite->execute(array(
      ":titre" => $this -> titre,
      ":contenu" => $this -> contenu,
      ":date" => $date -> format('Y-m-d h:i:s'),
      ":chapo" => $this -> chapo,
      ":user_id" => $this -> user_id,
    ));
    // var_dump($whrite);
  }
  public function showArticle($bdd) {
    $sql = "SELECT * FROM article WHERE titre ='".$this -> titre."'" ;
    $show = $bdd -> query($sql)-> fetchAll();
    // var_dump($show);
  }

  public function updateArticle($bdd) {
    $update = $bdd -> prepare("UPDATE article SET titre = :titre, contenu = :contenu, date = :date, chapo = :chapo, user_id = :user_id");
    $update->execute(array(
      ":titre" => $this -> titre,
      ":contenu" => $this -> contenu,
      ":date" => $date -> format('Y-m-d h:i:s'),
      ":chapo" => $this -> chapo,
      ":user_id" => $this -> user_id,
    ));
  }

  public function deleteArticle($bdd) {
    $sql = $bdd -> prepare("DELETE FROM article WHERE titre ='".$this -> titre."'");
    $delete = $sql -> execute();
  }
}
