<?php
    include 'fonctions.php';
    //include './config/config.php';
    include './config/sqlServer.class';

   // $db = connexion_bd();

    require './config/config.php';
    $db = new SqlServer($databaseInfo[SERVER],$databaseInfo[DATABASE]);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $Param = '%FTV%';
        $requestParam = array(&$Param);
        $request = "SELECT [nom], [id_activite_test] FROM [APP_AAEP7_CUST].[dbo].[ACTIVITE_TEST] WHERE [nom] LIKE ?";
        $a= $db->LoadData($request, $requestParam);
        echo $a[0];
    }
    catch (PDOException $e) {
        //traitement d'une erreur SQL
        //affiche_message_erreur("Erreur SQL");
        exit;
    }

    unset($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="./css/global.css" />
    <link rel="stylesheet" type="text/css" href="./css/formulaire.css" />
</head>

<!-- Affichage des sociétés dans une liste déroulante et envoie de la value grace à la méthode POST 
pour traitement par la suite -->

<body>

    <!-- Zone de titre -->
    <?php
        include 'bloc_titre.html';
    ?>

    <!-- Zone de sélection de la société -->

    <div id='société'>
        <fieldset>
            <legend>Société</legend>
                <form method="post" action="page2.php">
                    <select name="Societe">
                        <option value = 0 ></option>
                        <option value = 1 >France Television</option>
                        <option value = 2 >Galerie Lafayette</option>
                    </select>
                    <p><input type="submit" value="Confirmer" /></p>
                </form>
        </fieldset>
    </div>
</body>
</html>