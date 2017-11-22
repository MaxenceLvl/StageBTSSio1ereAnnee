<?php
include 'fonctions.php';
$db = connexion_db();

$req = "SELECT jour, heure_debut as h_d, heure_fin as h_f, minute_debut as m_d, minute_fin as m_f FROM activite_check_horaire_test WHERE id_activite = 1";
$res = $db->query($req);
$horaire = $res->fetchAll(PDO::FETCH_ASSOC);

echo strlen($horaire[3]['h_f']);
echo '<p></p>';
echo strlen($horaire[0]['h_f']);
echo '<p></p>';

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


echo "Lundi : " . $horaire[0]['h_d'] . " : " . $horaire[0]['m_d'];
echo '<p></p>';


//print_r($horaire);
echo '<p></p>';
echo '<p></p>';
//affiche_jour($lun['jour']);
echo '<p></p>';
print_r($lun);

?>

<form method="post">
	<?php
	$jour = array($lun, $mar, $mer, $jeu, $ven, $sam, $dim);
	//print_r($jour);
	echo '<br>';
	for ($i=0;$i<count($jour);$i++){
		affiche_jour($jour[$i]['jour']);
		echo ' : <input type="text" size="2" maxlength="2" value="' . $jour[$i]['h_d'] . '"> : <input type="test" size="2" maxlength="2" value="' . $jour[$i]['m_d'] . '">';
		echo ' ' . ' ' . ' ' . ' ';
		echo '<input type="text" size="2" maxlength="2" value="' . $jour[$i]['h_f'] . '"> : <input type="test" size="2" maxlength="2" value="' . $jour[$i]['m_f'] . '"><br>';
	}
	?>
</form>