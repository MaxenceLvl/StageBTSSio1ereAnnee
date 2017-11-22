<?php

function connexion_db(){
	require_once('./config/config.php');
	try {
		$db = new PDO(SGBD.':host='.HOST.';dbname='.BASE, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	catch (PDOException $e){
		//affiche_message_erreur('Erreur de connexion');
		exit;
	}
}

function affiche_message_erreur($message){
	echo "<script type=\"text/javascript\"> alert(\"$message\"); </script>";
	exit;
}

//proc qui vérifie si un utilisateur s'est identifié
function ouvre_session() {
	session_name('test');
	session_start();
}

//fonction qui retourne true si une session est ouverte avec utilisateur identifié
function test_session() {
	$res=false;
	if (isset($_SESSION['id'])) {
		$res=true;
	}
	return $res;
}

function affiche_jour($j){
	if ($j == 1){
		echo "Dimanche";
	} else if ($j == 2) {
		echo "Lundi";
	} else if ($j == 3) {
		echo "Mardi";
	} else if ($j == 4) {
		echo "Mercredi";
	} else if ($j == 5) {
		echo "Jeudi";
	} else if ($j == 6) {
		echo "Vendredi";
	} else if ($j == 7) {
		echo "Samedi";
	}
}
?>