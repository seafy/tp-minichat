<!DOCTYPE html>
<html>
<head>
	<title>minichat seafy</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>





<?php 

	try{
		$bdd = new PDO("mysql:host=localhost;dbname=minichat2;charset=utf8","root","hasquette");
	}

	catch(Exception $e)
	{
		die('Erreur :' .$e->getMesssage());
	}


// Récupération des 10 derniers messages
$reponse = $bdd->query("SELECT * FROM `dialogue` ORDER BY id ASC");
$donnees=$reponse->fetchAll();

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
?>

<div class="block">
	<form action="minichat_post.php" method="post">
		<input type="text" name="pseudo" placeholder="pseudo">
		<br><textarea rows="5" cols="19" name="message" placeholder="ecrivez votre text ici !"></textarea>
		<br><input type="submit" name="" value="envoyer" class="mx-5">
	</form>
</div>
	
	<?php 
	foreach($donnees as $infos): ?>
    	<div id="msg">
    		<p>pseudo :<?php echo htmlspecialchars($infos['pseudo']); ?></p>
        	<p align="justify" > <?php echo htmlspecialchars($infos['message']); ?></p>
    	</div>
    	
	<?php endforeach; ?>




<?php  
$reponse->closeCursor(); 
?>



</body>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</html>