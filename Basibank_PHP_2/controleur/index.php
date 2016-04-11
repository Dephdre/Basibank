<?php

ob_start();

session_start();

require_once('../modele/connexion_bdd.php');
require_once "../modele/selection_utilisateur_de_connexion.php";
require_once "../modele/verifier_existence_utilisateur.php";
require_once "../modele/ajouter_utilisateur.php";

/* ============================================================================
    Connexion d'un utilisateur
============================================================================ */

if (isset($_POST["connexion-submit"]))
{

    # Si les champs sont remplis...
    if (!empty($_POST["connexion-pseudonyme"]) and
        !empty($_POST["connexion-mot-de-passe"]))
    {
        $pseudonyme = $_POST["connexion-pseudonyme"];
        $mot_de_passe = hash("sha256", $_POST["connexion-mot-de-passe"]);

        $utilisateur = selection_utilisateur_de_connexion($pseudonyme);

        # Si le mot de passe entré est correct...
        if ($mot_de_passe == $utilisateur["mdp"])
        {
            $_SESSION["utl_id"] = $utilisateur["id"];
            $_SESSION["utl_pseudo"] = $utilisateur["pseudo"];
            header("Location:banques.php");
        }
        else
        {
            header("Location:?erreur-connexion=true");
        }

    }
    else
    {
        header("Location:?erreur-connexion=true");
    }

}

/* ============================================================================
    Création d'un utilisateur
============================================================================ */

if (isset($_POST["inscription-submit"]))
{

    # Si les champs sont remplis...
    if (!empty($_POST["inscription-pseudonyme"]) and
        !empty($_POST["inscription-mot-de-passe-1"]) and
        !empty($_POST["inscription-mot-de-passe-2"]))
    {
        $pseudonyme = $_POST["inscription-pseudonyme"];
        $mot_de_passe_1 = hash("sha256", $_POST["inscription-mot-de-passe-1"]);
        $mot_de_passe_2 = hash("sha256", $_POST["inscription-mot-de-passe-2"]);

        # Si les mots de passe sont identiques...
		if ($mot_de_passe_1 != $mot_de_passe_2)
		{
			header("Location:?erreur-correspondance-mots-de-passe=true");
		}
		else
		{
			$utilisateur_existe = verifier_existence_utilisateur($pseudonyme);

            # Si l'utilisateur n'existe pas déjà...
			if ($utilisateur_existe == false)
			{
                ajouter_utilisateur($pseudonyme,$mot_de_passe_1);
				header("Location:?utilisateur-cree=true");
			}
			else
			{
				header("Location:?erreur-utilisateur-existe=true");
			}

		}

    }
    else
    {
        header("Location:?erreur-champs=true");
    }

}

require_once("../vue/index.php");

ob_end_flush();

?>