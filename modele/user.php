<?php
class User 
{
    private $_id;
    private $_pseudo;
    private $_mdp;
    
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

    public function getPseudo(){
        return $this->_pseudo;
    }

    public function getMdp(){
        return $this->_mdp;
    }

    //setter
    private function setId($id)
    {
        $this->_id = htmlspecialchars($id);
    }
    
    private function setPseudo($pseudo)
    {
        $this->_pseudo = htmlspecialchars($pseudo);
    }

    private function setMdp($mdp)
    {
        $this->_mdp = $mdp ;
    }
};