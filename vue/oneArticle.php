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

<!-- Le corps -->  
<body>
    <hr> 
    <h2>Voici les derniers articles en vogue :</h2>

    <?php
        require ("../modele/articleManager.php");
        $id = $_GET["id"];
        $d = new ArticleManager;
        $d->readOneArticle($id);
        //var_dump($_SESSION["article"]);
        ?>
        
        <?php 
            $article = $_SESSION["oneArticle"];
            $arti = new Article($article);
        ?>

        <div class="article">
        <h3><?=$arti->getTitle()?></h3>

        <p class="content"><?=$arti->getContent()?></p>
        
        <p class="date"><?=$arti->getDate()?> </p>
        
        <p>Auteur : <?=$article["pseudo"]?></p>
        
        <button>Modifier</button>
        
        </div>
        
        


    </body>

    <!-- Le pied de page -->
        
    <?php include("../template/pied.php"); ?>