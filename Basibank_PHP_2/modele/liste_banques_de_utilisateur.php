<?php

function liste_banques_de_utilisateur()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM banques WHERE utl_id = :utl_id ORDER BY intitule ASC");
    $req->execute(array(":utl_id" => $_SESSION["utl_id"]));
    $banques = $req->fetchAll();
    return $banques;
}

?>