<?php 
    require_once ("../modele/user.php");
    require_once ("../modele/coms.php");
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
            <h3><?=$arti->getTitle()?></h3>
            <p class="content"><?=$arti->getContent()?></p>
            <p class="date"><?=$arti->getDate()?> </p>
            <p>Auteur : <?=$article["pseudo"]?></p>    
            
        </div>
        <button><a href="newCom.php?id=<?= $id ?>">Commenter</a></button>  
    
    
        <h3>Les commentaires</h3>
        <?php
            require ("../modele/comManager.php");
            $e = new ComManager;
            $e->read($id);
            
        foreach ($_SESSION["com"] as $coms)
        {
            $com = new Coms($coms);
        
        ?>
        <div class="coms">
            <h4><?=$coms["pseudo"]?> a commenté ceci :</h4>
            <p class=titlecom><?=$com->getTitle()?></p>
            <p class=comment><?=$com->getContent()?></p>
            <p class="date"><?=$com->getDate()?></p>      
        </div>
        <?php 
        }
        ?>

    </body>

    <!-- Le pied de page -->
            
    <?php include("../template/pied.php"); ?>

</html>