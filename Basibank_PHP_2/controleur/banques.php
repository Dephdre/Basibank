<?php

ob_start();

session_start();

require_once('../modele/connexion_bdd.php');
require_once "../modele/liste_banques_de_utilisateur.php";
require_once "../modele/ajouter_banque.php";

/* =============================================================================
    Listes des banques
============================================================================= */

$banques = liste_banques_de_utilisateur();

/* =============================================================================
    Création d'une banque
============================================================================= */

if (isset($_POST["ajout-submit"]))
{
    
    # Si les champs sont remplis...
    if (!empty($_POST["ajout-intitule"]) or
        !empty($_POST["ajout-code-banque"]) or
        !empty($_POST["ajout-code-guichet"]))
    {
		$intitule = $_POST["ajout-intitule"];
        $code_banque = $_POST["ajout-code-banque"];
        $code_guichet = $_POST["ajout-code-guichet"];

        # Si le code banque et le code guichet comprennent chacun 5 chiffres
        if (strlen($code_banque) == 5 and strlen($code_guichet) == 5)
        {
            ajouter_banque($intitule,$code_banque,$code_guichet);
			header("Location:#");
        }
        else
        {
            header("Location:?erreur-champs=true");
        }

    }
    else
    {
        header("Location:?erreur-champs=true");
    }

}

require_once("../vue/banques.php");

ob_end_flush();

?>