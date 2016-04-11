<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="../vue/css/normalize.css">
        <link rel="stylesheet" href="../vue/css/commun.css">
        <link rel="stylesheet" href="../vue/css/index.css">
    </head>
    <body>
        <?php require_once "inc/header.php"; ?>
    
        <section>
            <div id="">
                <h4>Opérations planifiées</h4><?php

                /* ============================================================
                    Liste des opérations planifiées
                ============================================================ */
            
                        echo "
                <table>
                    <tr>
                        <th id=\"th_intitule\">Intitulé</th>
                        <th id=\"th_montant\">Montant</th>
                        <th id=\"th_type\">Type</th>
                        <th id=\"th_date\">Date</th>
                        <th id=\"th_suppr\"></th>
                    </tr>";

                        foreach ($operations_planifiees as $operation_planifiee)
                        {

                            if ($operation_planifiee["type_o"] == 0)
                            {
                                echo "
                    <tr>
                        <td class=\"td_intitule\">{$operation_planifiee["intitule"]}</td>
                        <td class=\"td_mnt_pos\">{$operation_planifiee["montant"]}</td>
                        <td class=\"td_type\">Entrée</td>
                        <td class=\"td_date\">{$operation_planifiee["date_o"]}</td>
                        <td class=\"td_suppr\"><a href=\"supprimer_operation.php?operarion-id={$operation_planifiee["id"]}\">Supprimer</a></td>
                    </tr>";
                            }
                            else
                            {
                                echo "
                    <tr>
                        <td class=\"td_intitule\">{$operation_planifiee["intitule"]}</td>
                        <td class=\"td_mnt_neg\">-{$operation_planifiee["montant"]}</td>
                        <td class=\"td_type\">Sortie</td>
                        <td class=\"td_date\">{$operation_planifiee["date_o"]}</td>
                        <td class=\"td_suppr\"><a href=\"supprimer_operation.php?operation-id={$operation_planifiee["id"]}\">Supprimer</a></td>
                    </tr>";
                            }

                        }

                        echo "
                </table>";

                ?>

                <h4>Opérations archivées</h4><?php

                /* ============================================================
                    Listes des opérations archivées
                ============================================================ */

                        echo "
                <table>
                    <tr>
                        <th id=\"th_intitule\">Intitulé</th>
                        <th id=\"th_montant\">Montant</th>
                        <th id=\"th_type\">Type</th>
                        <th id=\"th_date\">Date</th>
                        <th id=\"th_suppr\"></th>
                    </tr>";

                        foreach ($operations_archivees as $operation_archivee)
                        {

                            if ($operation_archivee["type_o"] == 0)
                            {
                                echo "
                    <tr>
                        <td class=\"td_intitule\">{$operation_archivee["intitule"]}</td>
                        <td class=\"td_mnt_pos\">{$operation_archivee["montant"]}</td>
                        <td class=\"td_type\">Entrée</td>
                        <td class=\"td_date\">{$operation_archivee["date_o"]}</td>
                        <td class=\"td_suppr\"><a href=\"supprimer_operation.php?operarion-id={$operation_archivee["id"]}\">Supprimer</a></td>
                    </tr>";
                            }
                            else
                            {
                                echo "
                    <tr>
                        <td class=\"td_intitule\">{$operation_archivee["intitule"]}</td>
                        <td class=\"td_mnt_neg\">-{$operation_archivee["montant"]}</td>
                        <td class=\"td_type\">Sortie</td>
                        <td class=\"td_date\">{$operation_archivee["date_o"]}</td>
                        <td class=\"td_suppr\"><a href=\"supprimer_operation.php?operation-id={$operation_archivee["id"]}\">Supprimer</a></td>
                    </tr>";
                            }

                        }

                        echo "
                </table>";

                        ?>

            </div>
            <div id="">
                <h3>Ajouter une opération</h3>
                <form method="post" action="#">
                    <div id="">
                        <label>Intitulé</label><input type="text" name="ajout-intitule" id="">
                    </div>
                    <div id="">
                        <label>Montant</label><input type="text" name="ajout-montant" id="">
                    </div>
                    <div id="">
                        <label>Type</label><select name="ajout-type" id=""><option value="0">Entrée</option><option value="1">Sortie</option></select>
                    </div>
                    <div id="">
                        <label>Date</label><input type="date" name="ajout-date" id="" placeholder="jj-mm-aaaa">
                    </div>
                    <div id="">
                        <label></label><input type="submit" name="ajout-submit" id="" value="Ajouter une opération">
                    </div>
                </form>
            </div>
        </section>
        <?php require_once "inc/footer.php"; ?>
    
    </body>
</html>