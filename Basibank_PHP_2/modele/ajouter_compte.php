<?php

function ajouter_compte($banque_id,$intitule,$numero,$solde)
{
    global $bdd;
    $req = $bdd->prepare("INSERT INTO comptes VALUES(0,:utl_id,:bnq_id,:int_cpt,:num_cpt,:sld_cpt)");
    $req->bindParam(":utl_id", $_SESSION["utl_id"]);
    $req->bindParam(":bnq_id", $banque_id);
    $req->bindParam(":int_cpt", $intitule);
    $req->bindParam(":num_cpt", $numero);
    $req->bindParam(":sld_cpt", $solde);
    $req->execute();
}

?>