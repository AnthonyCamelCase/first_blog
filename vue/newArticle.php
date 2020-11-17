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
    </div>
    <h2>Votre nouvel article :</h2>
    <div>
    <?php
    if (isset($erreur))
    {
    echo erreur;
    }
    ?>
    <fieldset><legend>Nouvel article</legend>  
    <form action="../traitement/writeArticle.php" method="post">
    <label for="title"></label>
    <input type="text" name="title" id="title" placeholder="Titre de votre article"><br><br>
    <label for="content"></label>
    <textarea name="content" id="content" placeholder="contenu de l'article"></textarea>
    
    </fieldset><br>
    <button type="submit" value="write">Write</button>
    </form>
    
    </div>
    <!-- Le pied de page -->
    
    <?php include("../template/pied.php"); ?>
</body>
</html>