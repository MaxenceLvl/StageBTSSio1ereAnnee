<?php
include('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Test</title>
<link rel="stylesheet" type="text/css" href="./css/global.css" />
<link rel="stylesheet" type="text/css" href="./css/formulaire.css" />
</head>

<body>

<!-- Zone de titre -->

<?php
include('bloc_titre.html');
?>

<!-- Zone de sélection de l'activité -->

	<form method="get" action="main2.php">
	    <select name="societe" id="societe" onchange="act()">
	        <option value = "none" selected disabled>  </option>
	        <option value = 1 >France Television</option>
	        <option value = 2 >Galerie Lafayette</option>
	    </select>
	    <p id="act"></p>
		<input type="submit" value="Suivant" />
	</form>

	<script type="text/javascript">
		function act() {
			var $societe = document.getElementById('societe').value;
			document.getElementById('act').innerHTML = $societe;
			
		}
	</script>

</body>
</html>