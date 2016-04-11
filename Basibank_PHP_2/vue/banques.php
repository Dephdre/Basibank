<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Banques</title>
        <link rel="stylesheet" href="../vue/css/normalize.css">
        <link rel="stylesheet" href="../vue/css/commun.css">
        <link rel="stylesheet" href="../vue/css/index.css">
    </head>
    <body>
        <?php require_once "inc/header.php"; ?>
    
        <section>
            <div id=""><?php

                        foreach ($banques as $banque)
                        {
                            echo "
                <div class=\"bloc_banque\">
                    <img src=\"../img/banque.png\" alt=\"\"/>
                    <a href=\"comptes.php?banque-id={$banque["id"]}&banque-intitule={$banque["intitule"]}\">{$banque["intitule"]}</a>
                    <a href=\"supprimer_banque.php?bnq_id={$banque["id"]}\" class=\"supprimer\">x</a>
                </div>";
                        }

            ?>

            </div>
            <div id="">
                <h3>Ajouter une banque</h3>
                <form method="post" action="#">
                    <div id="">
                        <label>Intitulé</label><input type="text" name="ajout-intitule" id="">
                    </div>
                    <div id="">
                        <label>Code banque</label><input type="text" name="ajout-code-banque" id="" maxlength=5>
                    </div>
                    <div id="">
                        <label>Code guichet</label><input type="text" name="ajout-code-guichet" id="" maxlength=5>
                    </div>
                    <div id="">
                        <label></label><input type="submit" name="ajout-submit" id="" value="Ajouter une banque">
                    </div>
                </form><?php

                        if (isset($_GET["erreur-champs"]))
                        {
                            echo "
                <p>Les champs ne sont pas remplis correctement</p>";
                        }

                        ?>

            </div>
        </section>
        <?php require_once "inc/footer.php"; ?>
    
    </body>
</html>