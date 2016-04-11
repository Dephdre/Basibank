<?php

function ajouter_operation($banque_id,$compte_id,$intitule,$montant,$type,$date)
{
    global $bdd;
    $req = $bdd->prepare("INSERT INTO operations VALUES (0,:utl_id,:bnq_id,:cpt_id,:int_ope,:mnt_ope,:typ_ope,:dte_ope,0)");
    $req->bindParam(":utl_id", $_SESSION["utl_id"]);
    $req->bindParam(":bnq_id", $banque_id);
    $req->bindParam(":cpt_id", $compte_id);
    $req->bindParam(":int_ope", $intitule);
    $req->bindParam(":mnt_ope", $montant);
    $req->bindParam(":typ_ope", $type);
    $req->bindParam(":dte_ope", $date);
    $req->execute();
}

?>