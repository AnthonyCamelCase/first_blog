<?php 
    require_once ("../modele/user.php");
    require_once ("../modele/article.php");
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
    
    <!-- L'en-tête et le menu -->
        
    <?php include("../template/menu.php"); ?>

    <!-- Le corps -->

    <body> 
        <hr>   
        <h2>Votre page perso avec vos articles et commentaires.</h2>

        <?php //appelle seulement les les articles du membre connecté
            require ("../modele/articleManager.php");
            $d = new ArticleManager;
            $d->readMemberArticle();
        
            foreach ($_SESSION["articleMember"] as $article)
            {
                $arti = new Article($article);
        ?>

        <div class="article">
            <h3><?=$arti->getTitle()?></h3>
            <p class="content"><?=$arti->getContent()?></p>
            <p class="date">Date d'édition : <?=$arti->getDate()?> </p>
            <button><a href="editArticle.php?id=<?= $arti->getId()?>">Modifier</a></button> 
            <button><a href="../traitement/deleteArticle.php?id=<?= $arti->getId()?>">Supprimer</a></button>
            <button><a href="oneArticle.php?id=<?= $arti->getId()?>">voir l'article en entier</a></button>
        </div>
        </div>
        
        <?php
            }
        ?>

    </body>

    <!-- Le pied de page -->
        
    <?php include("../template/pied.php"); ?>
    
</html>