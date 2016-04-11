<?php

function liste_comptes_de_banque($banque_id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM comptes WHERE bnq_id = :bnq_id ORDER BY intitule ASC");
    $req->execute(array(":bnq_id" => $banque_id));
    $comptes = $req->fetchAll();
    return $comptes;
}

?>