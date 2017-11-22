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
include 'bloc_titre.html';
?>

    <!-- Zone d'authentification -->
	<article>
	    <div id='societe'>
	        <fieldset>
                <legend>Login</legend>
	        	<form method="post" action="trait_form_login.php">
	            	<p>Utilisateur :<p>
					<p><input type="text" name="user" id="user" /></p>
					<p>Mot de passe :</p>
					<p><input type="password" name="pass" id="pass" /></p>
					<p>Code :</p>
					<p><input type="password" name="code" id="code" /></p>
	                <p><input type="submit" value="Suivant" /></p>
	            </form>
	        </fieldset>
	    </div>
    </article>
</body>
</html>