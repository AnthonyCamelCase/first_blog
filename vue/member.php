<?php require_once ("../modele/user.php");

    session_start();  
    //vérification avant accès à la page
    if (isset($_SESSION['user'])){}
    else
    {
        header('Location: ../vue/connexion.php');
        exit();
    }
?>
<?php 
require_once ("../modele/article.php");

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

        <?php
        require ("../modele/articleManager.php");
        $d = new ArticleManager;
        $d->readMemberArticle();
        //var_dump($_SESSION["article"]);
        ?>
        
        <?php 
        foreach ($_SESSION["articleMember"] as $article)
        {
            $arti = new Article($article);
        ?>

        <div class="article">
            <h3><?=$arti->getTitle()?></h3>

            <p class="content"><?=$arti->getContent()?></p>
            
            <p class="date">Date d'édition : <?=$arti->getDate()?> </p>

            <button><a href="oneArticle.php?id=<?= $arti->getId()?>">voir l'article en entier</a></button>
            
        </div>
        
        <?php
        }
        ?>

    </body>

    <!-- Le pied de page -->
        
    <?php include("../template/pied.php"); ?>