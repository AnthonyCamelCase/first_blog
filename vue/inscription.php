<?php session_start()?>
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
    <h2>Formulaire user :</h2>
    <div>
    <?php
    if (isset($erreur))
    {
    echo erreur;
    }
    ?>
    <fieldset><legend>Formulaire d'inscription</legend>  
    <form action="../traitement/formulaire.php" method="post">
    <label for="pseudo">Choisissez un pseudo : </label><input type="text" name="pseudo" id="pseudo"><br><br>
    <label for="mdp">Choisissez un mot de passe (pas trop bidon svp) : </label><input type="password" name="mdp" id="mdp"><br><br>
    <label for="mdp_verif">Rentrez de nouveau le mot de passe (toujours pas trop bidon du coup) : </label><input type="password" name="mdp_verif" id="mdp_verif">
    </fieldset>
    <br>
    <input type="submit" value="s'inscrire">   
    </form>
    
    </div>
</body>

<!-- Le pied de page -->
<?php include("../template/pied.php"); ?>

</html>