<?php

class admin
{
  private $email;
  private $nom;
  private $prenom;
  private $mdp;

  function __construct($nom,$prenom,$mdp,$email)
  {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    
    $this->mdp = $mdp;
  }
  function getemail (){ return $this->email;}
  function getnom (){return $this->nom;}
  function getmdp (){return $this->mdp;}
  function getprenom (){return $this->prenom;}
  




}
?>
