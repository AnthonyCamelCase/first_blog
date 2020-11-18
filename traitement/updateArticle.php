<?php  
    $id = $_GET["id"];
    require("../modele/articleManager.php");
    $f = new ArticleManager;
    $f->update($id);
?>