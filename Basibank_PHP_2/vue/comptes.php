<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Comptes</title>
        <link rel="stylesheet" href="../vue/css/normalize.css">
        <link rel="stylesheet" href="../vue/css/commun.css">
        <link rel="stylesheet" href="../vue/css/index.css">
    </head>
    <body>
        <?php require_once "inc/header.php"; ?>
    
        <section>
            <div id=""><?php

                        foreach ($comptes as $compte)
                        {
                            echo "
                <div class=\"bloc_compte\">
                    <img src=\"../img/compte.png\" alt=\"\"/>
                    <a href=\"operations.php?compte-id={$compte["id"]}&banque-intitule={$_GET["banque-intitule"]}&compte-intitule={$compte["intitule"]}\">{$compte["intitule"]}</a>
                    <a href=\"supprimer_compte.php?cpt_id={$compte["id"]}\" class=\"supprimer\">x</a>
                    <p>{$compte["solde"]} €</p>
                </div>";
                        }

                        ?>

            </div>
            <div id="">
                <h3>Ajouter un compte bancaire</h3>
                <form method="post" action="#">
                    <div id="">
                        <label>Intitulé</label><input type="text" name="ajout-intitule" id="">
                    </div>
                    <div id="">
                        <label>Numéro</label><input type="text" name="ajout-numero" id="" maxlength=11>
                    </div>
                    <div id="">
                        <label>Solde</label><input type="text" name="ajout-solde" id="">
                    </div>
                    <div id="">
                        <label></label><input type="submit" name="ajout-submit" id="" value="Ajouter un compte">
                    </div>
                </form>
            </div>
        </section>
        <?php require_once "inc/footer.php"; ?>
    
    </body>
</html>