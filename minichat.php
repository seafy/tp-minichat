<?php include"page/header.php" ?>


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
<div class="row mx-auto my-sm-5">
	<div class="block ">
		<form action="minichat_post.php" method="post">
			<input type="text" name="pseudo" placeholder="pseudo">
			<br><textarea rows="5" cols="19" name="message" placeholder="ecrivez votre text ici !"></textarea>
			<br><input type="submit"  value="envoyer" class="mx-5">
		</form>
	</div>
	
	<?php 
	foreach($donnees as $infos): ?>
    	<div id="msg" class="col-12 col-sm-12 col-md-12 col-lg-12 ">
    		<p>pseudo :<?php echo htmlspecialchars($infos['pseudo']); ?></p>
        	<p align="justify" > <?php echo htmlspecialchars($infos['message']); ?></p>
    	</div>
    	
	<?php endforeach; ?>
</div>



<?php  
$reponse->closeCursor(); 
?>



<?php include"page/footer.php" ?>