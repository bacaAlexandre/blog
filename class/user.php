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
      $this -> password = $password;
      $this -> email = $email;
      $this -> admin = $admin;
    }

    public function signIn($bdd){
      $sql = "SELECT * FROM user WHERE user.email = '".$this -> email."'";
      $userInscription = $bdd -> query($sql) -> fetch();


      if ($userInscription === false){
        $sql = $bdd->prepare("INSERT INTO user (pseudo, password, email) VALUES (:pseudo, :password, :email)");
        $sql->execute(array(
          ":pseudo" => $this -> pseudo,
          ":password" => sha1($this -> password),
          ":email" => $this -> email,
        ));

      } else{
        echo "l'email existe déjà";
      }
    }

    public function connect($bdd){
      $sql = "SELECT *
      FROM user
      WHERE user.email = '".$this -> email."' AND user.password = '".sha1($this -> password)."'";
      $userConnexion = $bdd -> query($sql)-> fetch();


      if ($userConnexion){
        $_SESSION['user'] = array(
          "userPseudo" => $userConnexion['pseudo'],
          "userId" =>  $userConnexion['id'],

        );
      }else{
        echo "Vérifier les infos de connexion";
      }
    }

    public function disconnect($bdd){
      unset($_SESSION['user']);
    }
  }
