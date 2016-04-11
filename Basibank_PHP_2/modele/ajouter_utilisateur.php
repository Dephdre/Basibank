<?php

function ajouter_utilisateur($pseudonyme,$mot_de_passe_1)
{
    global $bdd;
    $req = $bdd->prepare("INSERT INTO utilisateurs VALUES (0,:pseudo,:mdp)");
    $req->bindParam(":pseudo",$pseudonyme);
    $req->bindParam(":mdp",$mot_de_passe_1);
    $req->execute();
}

?>