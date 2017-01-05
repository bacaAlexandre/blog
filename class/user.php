<?php


class User
  {
    private $id;
    public $pseudo;
    private $password;
    private $email;
    private $nom;
    private $prenom;
    private $admin;


    public function __construct($pseudo, $password, $email, $admin){
      $this -> pseudo = $pseudo;
      $this -> password = $pasword;
      $this -> email = $email;
      $this -> admin = $admin;
    }
    public static function inscription($pseudo, $password, $email){
      $sql = "SELECT * FROM user WHERE user.email = ".$this -> email;
      $userInscription = $bdd -> execute($sql);

      if ($userInscription === false){
        $sql = $bdd->prepare("INSERT INTO user (pseudo, password, email) VALUES (:pseudo, :password, :email)");
        $insertUser->execute(array(
          ":pseudo" => $this -> pseudo;
          ":password" => sha1($this -> password);
          ":email" => $this -> email;
        ))

      }else{
        echo "l'email existe déjà";
      }
    };


    public static function connexion(){
      $sql = "SELECT * FROM user WHERE user.email = ".$this -> email."AND"user.password = .$this -> password;
      $userConnexion = $bdd -> query($sql)-> fetch();
      if ($userConnexion){
        $_SESSION['user'] = array(
          "userPseudo" => $userConnexion['pseudo'];
          "userId" =>  $userConnexion['id'];

          )
      }else{
        $message = "Vérifier les infos de connexion";
      }
    };

    public static function deconnexion(){
      session_destroy();
    };
  }
