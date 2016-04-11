<?php

function ajouter_banque($intitule,$code_banque,$code_guichet)
{
    global $bdd;
    $req = $bdd->prepare("INSERT INTO banques VALUES (0,:utl_id,:int_bnq,:cde_bnq,:cde_gui)");
    $req->bindParam(":utl_id",$_SESSION["utl_id"]);
    $req->bindParam(":int_bnq",$intitule);
    $req->bindParam(":cde_bnq",$code_banque);
    $req->bindParam(":cde_gui",$code_guichet);
    $req->execute();
}

?>