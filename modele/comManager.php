<?php
require_once ('DB.php');
require_once ('user.php');
require_once ('article.php');
session_start();
class ComManager extends DB
{
    public function create($id)
    {   
        //sécuriser la donnée :
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST["content"]);
        $user = $_SESSION["user"]->getID();
        //test si les champs sont vides :
        if ($title == NULL OR $content == NULL )
        {
            $erreur = "écrivez au moins un truc sinon ca sert à rien";
            header('Location: ../vue/newCom.php');
            exit();
        }
        //sinon ok : 
        else
        {
            //requete préparée :
            $bdd = $this->connect();
            $req = $bdd->prepare('INSERT INTO coms(title,content,user_id,article_id) VALUES(:title,:content,:user_id,:article_id)');
            $req->execute(array(
            'title' => $title,
            'content' => $content,
            'user_id'=> $user,
            'article_id'=>$id
            ));
            $req->closeCursor();
            header('Location: ../vue/oneArticle.php?id='.$id);
        }    
    } 
    
    public function read($id)
    {
        $bdd = $this->connect();
        // on requete les articles dont l'id est la session en cours.
        $req = $bdd->prepare('SELECT * FROM coms LEFT JOIN user ON coms.user_id = user.id WHERE coms.article_id =:id');
        $req->execute(array(
            'id' => $id,
            ));   
        $coms = $req->fetchAll();
        $_SESSION["com"]=$coms;
        $req->closeCursor();
    }

    public function delete($id)
    {
        $bdd = $this->connect();
        // on requete les articles dont l'id est la session en cours.
        $req = $bdd->prepare('DELETE FROM article WHERE id =:id');
        $req->execute(array(
            'id' => $id,
        ));
        $req->closeCursor();
        header('Location: ../vue/member.php');
    }
}
