<?php  
    $id = $_GET["id"];
    require("../modele/comManager.php");
    $g = new ComManager;
    $g->create($id);
?>