<?php
	require_once('Session_Verif.php');
	$link = mysqli_connect("localhost","admin@localhost","","test");

	if(isset($_GET['DelCap'])){
		mysqli_query($link,"ALTER TABLE Mesure DROP FOREIGN KEY fk_idCapteur");
		mysqli_query($link,"DELETE FROM `test`.`Capteur` WHERE CONCAT(`Capteur`.`idCapteur`) = 4");
		echo "teste réussit !!";
	}
	if(isset($_GET['DelAll'])){
		mysqli_query($link, "TRUNCATE Capteur;");}

	if(isset($_GET['AddCap'])){
		$idCap = $_GET['idCap'];
		$room = $_GET['room'];
	}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="author" content="" />
   <meta name="description" content="SAE23" />
   <meta name="keywords" content="HTML, CSS" />
   <title>Salle E204 </title>
   <link rel="stylesheet" type="text/css" href="./styles/styleRWD.css" />
  
 </head>
 
 <body>
  <header>
    <h1> Capteur CO2  </h1>
  </header>
  <nav>
    <ul>
		<li><a href="./index.php"> Accueil </a></li>
		<li><a href="./Gestion.php" > Gestion </a></li>
		<li><a href="./Consultation.php"> Consultation </a></li>		
	</ul>
  </nav>
  <section id="first">

Les differents boutons sont pour supprimer le capteur, ajouter le capteur et vider les valeur du capteur
<br>
<br>
  <form action="" method="get" class="form-example">
   <div class="user-box">
	<input type="submit" name="DelCap" value="supprimer le capteur correspondan">
	<input type="submit" name="DelAll" value="supprimer tou les capteur">
	<label>Name/id</label>
    <input type="text" name="idCap">
   </div>
   <div class="user-box">
	<label>Room/E...</label>
    <input type="txt" name="room">
   </div>
     <input type="submit" name="AddCap" value="Add Captor">
  </form>
  </section>
  <footer>
    <ul>
	  <li>IUT de Blagnac</li>
	  <li>Département Réseaux et Télécommunications</li>
      <li>BUT1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	</ul>  
  </footer>
 </body>
</html>
