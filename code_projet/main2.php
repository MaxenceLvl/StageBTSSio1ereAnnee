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
	<form method="post" action="main3.php">
		<select name="societe" id="societe">
		
			<?php
			//var_dump(isset($_POST['societe']));
			if(isset($_POST['societe'])){
				$societe = $_POST['societe'];
				if ($societe == 1){
					echo '<option selected="selected">France Télévision</option>';
				} else {
					echo '<option selected="selected">Galerie Lafayette</option>';
				}
			}
			?>
		</select>
		
		<p></p>
		
<!-- Zone de sélection de l'opération -->

		<select name="activite" id="activite">
			<?php 
			$db = connexion_db();
			
			try{
				if(isset($_POST['societe'])){
					$societe = $_POST['societe'];
				}
				
				if($societe == 1){
					$val = '%FTV%';
				} else if($societe == 2){
					$val = '%GL%';
				}
				
				$req = "SELECT nom, id_activite_test FROM activite_test WHERE nom LIKE '$val'";
				$res = $db->query($req);
				while ($act = $res->fetch(PDO::FETCH_OBJ)){
					echo '<option>'. $act->nom . '</option>';
				}
			}
			catch (Exception $e) {
		
				affiche_message_erreur("Erreur");
				exit;
		
			}
			unset($db);
			
			?>
		</select>
		
		<p></p>
		
		<a href="main.php">Retour</a>
		<input type="submit" value="Suivant">
	</form>
</body>
</html>
	
	
	
	