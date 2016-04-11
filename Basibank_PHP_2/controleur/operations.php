<?php

ob_start();

session_start();

require_once('../modele/connexion_bdd.php');
require_once "../modele/liste_operations_planifiees_de_compte.php";
require_once "../modele/liste_operations_archivees_de_compte.php";
require_once "../modele/ajouter_operation.php";

$banque_id = $_SESSION["banque-id"];
$compte_id = $_SESSION["compte-id"] = $_GET["compte-id"];

/* ============================================================================
    Mise à jour des opérations
============================================================================ */

$req = $bdd->prepare("
    SELECT * FROM comptes
    INNER JOIN operations
    ON comptes.id = operations.cpt_id
    WHERE etat = 0
");
$req->execute();
$rlt = $req->fetchAll();

foreach($rlt as $row)
{
    # Si la date de l'opération est antérieure ou égale à la date actuelle...
    if ($row["date_o"] <= date("Y-m-d"))
    {

        # Si c'est une opération d'entrée d'argent...
        if ($row["type_o"] == 0)
        {
            $calcul = $row["montant"] + $row["solde"];
        }
        else
        {
            $calcul = - $row["montant"] + $row["solde"];
        }

        $req = $bdd->prepare("
            UPDATE comptes
            SET solde = :solde
            WHERE id = :cpt_id
        ");
        $req->execute(array(
            ":solde" => $calcul,
            ":cpt_id" => $row["cpt_id"]
        ));
        $req = $bdd->prepare("
            UPDATE operations
            SET etat = 1
            WHERE id = :ope_id
        ");
        $req->execute(array(
            ":ope_id" => $row["id"]
        ));
        }
    }

/* ============================================================================
    Liste des opérations
============================================================================ */

$operations_planifiees = liste_operations_planifiees_de_compte($compte_id);
$operations_archivees = liste_operations_archivees_de_compte($compte_id);

/* ============================================================================
    Création d'une opération
============================================================================ */

if (isset($_POST["ajout-submit"]))
{
    
    # Si les champs sont remplis...
    if (!empty($_POST["ajout-intitule"]) and
        !empty($_POST["ajout-montant"]) and
        !empty($_POST["ajout-date"]))
    {
		$intitule = $_POST["ajout-intitule"];
        $montant = $_POST["ajout-montant"];
        $type = $_POST["ajout-type"];
        $date = $_POST["ajout-date"];

        ajouter_operation($banque_id,$compte_id,$intitule,$montant,$type,$date);
        header("Location:?compte-id={$compte_id}&banque-intitule={$_GET["banque-intitule"]}&compte-intitule={$_GET["compte-intitule"]}");
    }
    else
    {
        header("Location:?compte-id={$compte_id}&banque-intitule={$_GET["banque-intitule"]}&compte-intitule={$_GET["compte-intitule"]}&erreur-champs=true");
    }

}

require_once("../vue/operations.php");

ob_end_flush();

?>