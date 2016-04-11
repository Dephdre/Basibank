<?php

function liste_operations_archivees_de_compte($compte_id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM operations WHERE cpt_id = :cpt_id AND etat = 1 ORDER BY date_o DESC");
    $req->execute(array(":cpt_id" => $compte_id));
    $operations_archivees = $req->fetchAll();
    return $operations_archivees;
}

?>