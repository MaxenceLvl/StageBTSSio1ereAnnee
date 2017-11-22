<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
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
	<?php 
	$i=date('Y');
	echo $i;
	?>
    <div id='société'>
		<form method="post" action="page2.php">
			<select name="annee" id="annee">
				<?php 
					//on remplit la liste des années
					for ($i=date('Y');$i<=2030;$i++) {
						echo '<option>'.$i."</option>\n";
					}
				?>
			</select>
        </form>
    </div>
</body>
</html>