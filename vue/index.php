<?php 
    require_once ("../modele/user.php");
    session_start();
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
        <div>

        <p>Bienvenue sur le site de ouf ou y a que des trucs de ouf. Commencez par vous inscrire puis connecteez vous pour accéder au contenu.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium obcaecati dolore doloremque nobis. Sunt pariatur laboriosam consequatur est! Eveniet natus perspiciatis quaerat id est voluptates alias rem nobis ut dolorem.</p>
        </div>
    </body>    

    <!-- Le pied de page --> 
    <?php include("../template/pied.php"); ?>

</html>