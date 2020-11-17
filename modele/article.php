<?php

class Article
{
    private $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_user;

    
    //le constructeur toujour en public car j ai besoin de l appeller pour instancier un objet
    public function __construct($valeurs = array())//je specifie que je souhaite un array
    { 
        $this->hydrate($valeurs);//je fais appel a la fonction() hydrate 
    }

    //hydrate pour effectuer l hydratation
    //en private car s'est depuis l'objet et seulement l'objets qui va etre appeller (en l'occurence construct)

    private function hydrate(array $data)//fonction hydrate qui prend un tableau en l'occurence $valeur passée par le constructeur
    {
        foreach ($data as $key => $value) 
        {
            //for each classic
            $method = 'set'.ucfirst($key);//$method egal set contane avec la $key de la boucle ucfirts(mais la premier lettre en uppercasse)
                                          //cela permet de faire correspondre avec le setter approprietes tant ques les keys du tableau passer corresponde 
                                          //du coup il faut faire attention que le champ de la table en BDD correspondant au proprietes (exact nom)
            if (method_exists($this, $method)) {//method_exists() verifier que la method existe il prend en compte (l'instance en cours this ou la classe est en deuxieme argument la method a checker)
               $this->$method($value);//du coup si tout correspond il appelle le setter en questions 
            }
        }
    }

    //getter
    public function getId(){
        return $this->_id;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getContent(){
        return $this->_content;
    }

    public function getDate(){
        return $this->_date;
    }

    public function getUser(){
        return $this->_user;
    }

    

    //setter
    private function setId($id)
    {
        $this->_id = $id;
    }
    
    private function setTitle($title)
    {
        $this->_title = $title;
    }

    private function setContent($content)
    {
        $this->_content = $content ;
    }

    private function setDate($date)
    {
        $this->_date = $date ;
    }

    private function setUser($user)
    {
        $this->_user = $user ;
    }
};