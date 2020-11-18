<?php
require_once ('DB.php');
require_once ('user.php');
require_once ('article.php');
session_start();
class ArticleManager extends DB
{
    public function create()
    {   
        //sécuriser la donnée :
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST["content"]);
        $user = $_SESSION["user"]->getID();
        //test si les champs sont vides :
        if ($title == NULL OR $content == NULL )
        {
            $erreur = "rentrez bien toutes les case";
            header('Location: ../vue/newArticle.php');
            exit();
        }
        //sinon ok : 
        else
        {
            //requete préparée :
            $bdd = $this->connect();
            $req = $bdd->prepare('INSERT INTO article(title, content, user) VALUES(:title,:content,:user)');
            $req->execute(array(
            'title' => $title,
            'content' => $content,
            'user'=> $user
            ));
            $req->closeCursor();
            header('Location: ../vue/member.php'); 
        }    
    } 
    
    public function update($id)
    {   
        //sécuriser la donnée :
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST["content"]);
        //test si les champs sont vides :
        if ($title == NULL OR $content == NULL )
        {
            $erreur = "vous n'avez rien écrit";
            header('Location: ../vue/editArticle.php');
            exit();
        }
        //sinon ok : 
        else
        {
            //requete préparée :
            $bdd = $this->connect();
            $req = $bdd->prepare("UPDATE article SET title=:title, content=:content WHERE id=:id");
            $req->execute(array(
            'title' => $title,
            'content' => $content,
            'id' => $id,
            ));
            $req->closeCursor();
            header('Location: ../vue/member.php'); 
        }    
    } 

    public function readLastArticle()
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT article.id, pseudo, content, title, user, article.date  FROM article INNER JOIN user ON article.user = user.id');
        $req->execute();
        $arts = $req->fetchAll();
        $_SESSION["articles"]=$arts;
        $req->closeCursor();
    }

    public function readMemberArticle()
    {
        $bdd = $this->connect();
        //on récupère l'ID du SESSION USER
        $actualUser = $_SESSION["user"];
        // on requete les articles dont l'id est la session en cours.
        $req = $bdd->prepare('SELECT * FROM user LEFT JOIN article ON user.id = article.user WHERE user.id =?');
        $req->execute([$actualUser->getID()]);
        $arts = $req->fetchAll();
        $_SESSION["articleMember"]=$arts;
        $req->closeCursor();
    }

    public function readOneArticle($id)
    {
        $bdd = $this->connect();
        // on requete les articles dont l'id est la session en cours.
        $req = $bdd->prepare('SELECT * FROM user LEFT JOIN article ON user.id = article.user WHERE article.id =:id');
        $req->execute(array(
            'id' => $id,
            ));
        $arts = $req->fetch();
        $_SESSION["oneArticle"]=$arts;
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
