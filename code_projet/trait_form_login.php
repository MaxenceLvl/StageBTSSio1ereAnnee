<?php
    //récupération des données passées dans le formulaire de connexion
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $code = $_POST['code'];

    //chargement des fonctions
    include('fonctions.php');

    //ouverture d'une connexion 
    $db = connexion_db();
    
    try{

       $req = "SELECT id_user as id, Name, Pass, Code FROM users WHERE Name = '$user'";
       $res = $db->query($req);
       $user = $res->fetch(PDO::FETCH_OBJ);
       $res->closeCursor();
    } catch (PDOException $e) {
    	affiche_message_erreur("ERREUR SQL");
    	exit;
    }
    
    unset($db);
    
    if (md5($pass) == $user->Pass) {
    	ouvre_session();
    	$_SESSION['id'] = $user->id;
    	$_SESSION['nom'] = $user->Name;
    	$_SESSION['code'] = $user->Code;
    	header('Location: main.php');
    } else {
    	header('Location: login.php');
    }
?>