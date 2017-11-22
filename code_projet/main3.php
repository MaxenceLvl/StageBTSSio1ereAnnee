<?php
include('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Test</title>
<link rel="stylesheet" type="text/css" href="./css/global.css" />
<link rel="stylesheet" type="text/css" href="./css/formulaire.css" />
</head>

<body>
<!-- Zone de titre -->

	<?php
	include('bloc_titre.html');
	?>
	
	<?php 
		if (isset($_POST['societe'])){
			echo "<p>Vous avez sélectionné la société : " . $_POST['societe'] . ".</p>";
		}
		if (isset($_POST['activite'])){
			$act = $_POST['activite'];
			echo "<p>Vous avez sélectionné l'activité : " . $act . ".</p>";
		}
	?>
	<form method="post" action="trait_form_horaire.php">
	<?php 
		$db = connexion_db();
		
		$req = "SELECT id_activite_test as id FROM activite_test WHERE nom = '$act'";
		$res = $db->query($req);
		$id = $res->fetch(PDO::FETCH_OBJ);
		
		$req2 = "SELECT jour, heure_debut as h_d, heure_fin as h_f, minute_debut as m_d, minute_fin as m_f FROM activite_check_horaire_test WHERE id_activite = '$id->id'";
		$res2 = $db->query($req2);
		$horaire = $res2->fetchAll(PDO::FETCH_ASSOC);
		
		for ($i=0;$i<count($horaire);$i++){
			if (strlen($horaire[$i]['h_d']) == 1){
				$horaire[$i]['h_d'] = "0" . $horaire[$i]['h_d'];
			}
			if (strlen($horaire[$i]['m_d']) == 1){
				$horaire[$i]['m_d'] = "0" . $horaire[$i]['m_d'];
			}
			if (strlen($horaire[$i]['h_f']) == 1){
				$horaire[$i]['h_f'] = "0" . $horaire[$i]['h_f'];
			}
			if (strlen($horaire[$i]['m_f']) == 1){
				$horaire[$i]['m_f'] = "0" . $horaire[$i]['m_f'];
			}
		}
		
		for ($j=0;$j<count($horaire);$j++){
			if ($horaire[$j]['jour'] == 1){
				$dim = $horaire[$j];
			} else if ($horaire[$j]['jour'] == 2){
				$lun = $horaire[$j];
			} else if ($horaire[$j]['jour'] == 3){
				$mar = $horaire[$j];
			} else if ($horaire[$j]['jour'] == 4){
				$mer = $horaire[$j];
			} else if ($horaire[$j]['jour'] == 5){
				$jeu = $horaire[$j];
			} else if ($horaire[$j]['jour'] == 6){
				$ven = $horaire[$j];
			} else if ($horaire[$j]['jour'] == 7){
				$sam = $horaire[$j];
			}
		}
		
		$jour = array($lun, $mar, $mer, $jeu, $ven, $sam, $dim);
		
		for ($i=0;$i<count($jour);$i++){
			echo '<p>';
			affiche_jour($jour[$i]['jour']);
			echo ' : <input type="text" size="2" maxlength="2" value="' . $jour[$i]['h_d'] . '"> : <input type="test" size="2" maxlength="2" value="' . $jour[$i]['m_d'] . '">';
			echo ' ' . ' ' . ' ' . ' ';
			echo '<input type="text" size="2" maxlength="2" value="' . $jour[$i]['h_f'] . '"> : <input type="test" size="2" maxlength="2" value="' . $jour[$i]['m_f'] . '"></p>';
		}
	?>
	<p><a href="jours_feries.php">Jours Fériés</a></p>
	<p><input type="submit" value="Enregistrer" />  <input type="reset" value="Remmetre à zéro" /></p>
	<p><a href="deconnexion.php">Déconnexion</a></p>
	</form>



</body>
</html>