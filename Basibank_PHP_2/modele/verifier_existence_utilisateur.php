<?php
function verifier_existence_utilisateur($pseudonyme)
{
    global $bdd;
    $req = $bdd->prepare("SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo");
    $req->execute(array(":pseudo" => $pseudonyme));
    if ($req->rowCount() != 0)
    {
        $utilisateur_existe = true;
    }
    else
    {
        $utilisateur_existe = false;
    }
    return $utilisateur_existe;
}
?>