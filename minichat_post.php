	<?php
// connexion bdd
try{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat2;charset=utf8','root','hasquette');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO dialogue (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));


// Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
?>






