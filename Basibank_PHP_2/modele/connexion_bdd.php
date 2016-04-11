<?php

global $bdd;
$bdd = new PDO("mysql:host=mysql.hostinger.fr; dbname=u919533926_bdd", "u919533926_gwm", "lionera08!");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>