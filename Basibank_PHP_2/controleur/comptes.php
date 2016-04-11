<?php

ob_start();

session_start();

require_once('../modele/connexion_bdd.php');
require_once "../modele/liste_comptes_de_banque.php";
require_once "../modele/ajouter_compte.php";

$banque_id = $_SESSION["banque-id"] = $_GET["banque-id"];

/* ============================================================================
    Liste des comptes
============================================================================ */

$comptes = liste_comptes_de_banque($banque_id);

/* ============================================================================
    Création d'un compte
============================================================================ */

if (isset($_POST["ajout-submit"]))
{
    
    # Si les champs sont remplis...
    if (!empty($_POST["ajout-intitule"]) and
        !empty($_POST["ajout-numero"]) and
        !empty($_POST["ajout-solde"]))
    {
		$intitule = $_POST["ajout-intitule"];
        $numero = $_POST["ajout-numero"];
        $solde = $_POST["ajout-solde"];

        # Si le numéro de compte comporte 11 caractères...
        if (strlen($numero) == 11)
        {
            ajouter_compte($banque_id,$intitule,$numero,$solde);
			header("Location:#");
        }
        else
        {
            header("Location:?banque-id={$_GET["banque-id"]}&banque-intitule={$_GET["banque-intitule"]}&erreur-champs=true");
        }

    }
    else
    {
        header("Location:?banque-id={$_GET["banque-id"]}&banque-intitule={$_GET["banque-intitule"]}&erreur-champs=true");
    }

}

require_once("../vue/comptes.php");

ob_end_flush();

?>