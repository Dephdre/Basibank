<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Basibank - Accueil</title>
        <link rel="stylesheet" href="../vue/css/normalize.css">
        <link rel="stylesheet" href="../vue/css/commun.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <?php require_once "inc/header.php"; ?>

        <section>
            <article>
                <h3>Se connecter</h3>
                <form id="" method="post" action="#">
                    <div id="">
                        <label>Pseudonyme</label><input id="" type="text" name="connexion-pseudonyme">
                    </div>
                    <div id="">
                        <label>Mot de passe</label><input id="" type="text" name="connexion-mot-de-passe">
                    </div>
                    <div id="">
                        <label></label><input id="" type="submit" name="connexion-submit" value="Se connecter">
                    </div>
                </form><?php

                        if (isset($_GET["erreur-connexion"]))
                        {
                            echo "
                <p>Les identifiants sont incorrects</p>";
                        }

                        ?>

            </article>
            <article>
                <h3>S'inscrire</h3>
                <form id="" method="post" action="#">
                    <div id="">
                        <label>Pseudonyme</label><input id="" type="text" name="inscription-pseudonyme">
                    </div>
                    <div id="">
                        <label>Mot de passe</label><input id="" type="password" name="inscription-mot-de-passe-1">
                    </div>
                    <div id="">
                        <label>Mot de passe (confirmer)</label><input id="" type="password" name="inscription-mot-de-passe-2">
                    </div>
                    <div id="">
                        <label></label><input id="" type="submit" name="inscription-submit" value="S'inscrire">
                    </div>
                </form><?php

                        if (isset($_GET["erreur-correspondance-mots-de-passe"]))
                        {
                            echo "
                <p>Les mots de passe ne correspondent pas</p>";
                        }
                        if (isset($_GET["erreur-utilisateur-existe"]))
                        {
                            echo "
                <p>Cet identifiant est déjà utilisé</p>";
                        }
                        if (isset($_GET["utilisateur-cree"]))
                        {
                            echo "
                <p>Inscription effectuée</p>";
                        }
                        if (isset($_GET["erreur-champs"]))
                        {
                            echo "
                <p>Les champs ne sont pas remplis correctement</p>";
                        }

                        ?>

            </article>
        </section>
        <?php require_once "inc/footer.php"; ?>

    </body>
</html>