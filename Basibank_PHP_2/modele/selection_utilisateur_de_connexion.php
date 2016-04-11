<?php
function selection_utilisateur_de_connexion($pseudonyme)
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
    $req->execute(array(":pseudo" => $pseudonyme));
    $utilisateur = $req->fetch();
    return $utilisateur;
}
?>