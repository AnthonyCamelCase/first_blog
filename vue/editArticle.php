<?php 
    require_once ("../modele/user.php");
    session_start();
    //vérification avant accès à la page
    if (isset($_SESSION['user'])){}
    else
    {
        header('Location: ../vue/connexion.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8" />
            <title>Mon super site</title>
            <link rel="stylesheet" href="../style/mai.css">
    </head>
    
    <!-- L'en-tête --> 

    <?php include("../template/menu.php"); ?>

    <hr>

    <!-- Le corps --> 

    <body>  
        <h2>Voici les derniers articles en vogue :</h2>

        <?php
            require ("../modele/articleManager.php");
            $id = $_GET["id"];
            $d = new ArticleManager;
            $d->readOneArticle($id);
            $article = $_SESSION["oneArticle"];
            $arti = new Article($article);
        ?>

        <div class="article">
            <fieldset>
                <legend>Nouvel article</legend>  
                <form action="../traitement/updateArticle.php?id=<?= $arti->getId()?>" method="post">
                <label for="title"></label>
                <input type="text" name="title" id="title" value="<?=$arti->getTitle()?>">
                <br><br>
                <label for="content"></label>
                <textarea name="content" id="content"><?=$arti->getContent()?></textarea>
            </fieldset>
            <br>
            <button type="submit" value="edit">éditer</button>
            </form> 
            
        
            <p class="date"><?=$arti->getDate()?> </p>
            <p>Auteur : <?=$article["pseudo"]?></p>    
            
        </div>
        
        <button>Commenter</button>   
    </body>

    <!-- Le pied de page -->
            
    <?php include("../template/pied.php"); ?>

</html>