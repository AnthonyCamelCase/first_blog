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
        <h2>Connexion :</h2>
        <div>
        <?php
        if (isset($erreur))
        {
            echo "<h2>",$erreur,"</h2>";
        }
        ?>
        <fieldset><legend>Formulaire de connexion</legend> 
        <form action="../traitement/connect.php" method="post">
        <label for="pseudo">Votre pseudo : </label><input type="text" name="pseudo" id="pseudo"><br><br>
        <label for="mdp">Votre mot de passe : </label><input type="password" name="mdp" id="mdp"><br><br>
        </fieldset>
        <input type="submit" value="se connecter">   
        </form>
        
        </div>
        
    </body>

    <!-- Le pied de page -->
    <?php include("../template/pied.php"); ?>

</html>