<?php
	require_once('Session_Verif.php');

	$link = mysqli_connect("localhost","admin@localhost","","test"); #connecting to our DB
	function alterTable($link){
		mysqli_query($link, "ALTER TABLE Batiment
								ADD CONSTRAINT fk_gestBat FOREIGN KEY(gestBat) REFERENCES Administration(idAdmin);");
		mysqli_query($link, "ALTER TABLE Capteur
								ADD CONSTRAINT fk_idBat FOREIGN KEY(idBat) REFERENCES Batiment(idBat);");
		mysqli_query($link, "ALTER TABLE Mesure
								ADD CONSTRAINT fk_idCapteur FOREIGN KEY(idCapteur) REFERENCES Capteur(idCapteur);");
	}

	if(isset($_GET['dropAll'])){
		mysqli_query($link, "DROP TABLE IF EXISTS Mesure");
		mysqli_query($link, "DROP TABLE IF EXISTS Capteur");
		mysqli_query($link, "DROP TABLE IF EXISTS Batiment");
		echo "Toutes les tables non vitales on été supprimer";
	}
	if(isset($_GET['restorAll'])){
		mysqli_query($link, "CREATE TABLE Mesure
		(
		idMesure numeric(5) NOT NULL,
		idCapteur numeric(5) NOT NULL,
		typeCapteur varchar(20) NOT NULL,
		date DATE NOT NULL,
		horaire TIME NOT NULL,
		valeur numeric(6,2) NOT NULL,
		CONSTRAINT pk_mesure primary key(idMesure)
		);");
		mysqli_query($link, "CREATE TABLE Capteur
		(
		idCapteur numeric(5) NOT NULL,
		typeCapteur varchar(20) NOT NULL,
		numSalle varchar(4),
		idBat varchar(1) NOT NULL,
		CONSTRAINT pk_capteur primary key(idCapteur,typeCapteur)
		);");
		mysqli_query($link, "CREATE TABLE Batiment
		(
		idBat varchar(1) NOT NULL,
		nomBat varchar(30) NOT NULL,
		gestBat varchar(5) NOT NULL,
		CONSTRAINT pk_bat primary key(idBat)
		);");
		alterTable($link);
		echo "Toutes les table on été recréer";
	}
	if(isset($_GET['vidageAll'])){
		echo "Teste";
		mysqli_query($link, "TRUNCATE TABLE Mesure");
		mysqli_query($link, "TRUNCATE Capteur");
		mysqli_query($link, "TRUNCATE Batiment");
		echo "Toutes les tables on été vidé";
	}
	if(isset($_GET['dropB'])){
		mysqli_query($link, "DROP TABLE IF EXISTS Batiment");}
	if(isset($_GET['dropC'])){
		mysqli_query($link, "DROP TABLE IF EXISTS Capteur");}
	if(isset($_GET['dropM'])){
		mysqli_query($link, "DROP TABLE IF EXISTS Mesure");}

	if(isset($_GET['restorM'])){
		mysqli_query($link, "CREATE TABLE Mesure(
		idMesure int NOT NULL,
		idCapteur numeric(5) NOT NULL,
		typeCapteur varchar(20) NOT NULL,
		date DATE NOT NULL,
		horaire TIME NOT NULL,
		valeur numeric(3) NOT NULL,
		CONSTRAINT pk_mesure primary key(idMesure))");
		alterTable($link);
		}
	if(isset($_GET['restorC'])){
		mysqli_query($link, "CREATE TABLE Capteur(
		idCapteur numeric(5) NOT NULL,
		typeCapteur varchar(20) NOT NULL,
		numSalle varchar(4),
		idBat varchar(1) NOT NULL,
		CONSTRAINT pk_capteur primary key(idCapteur,typeCapteur)
		);");
		alterTable($link);
		}
	if(isset($_GET['restorB'])){
		mysqli_query($link, "CREATE TABLE Batiment(
		idBat varchar(1) NOT NULL,
		nomBat varchar(30) NOT NULL,
		gestBat varchar(5) NOT NULL,
		CONSTRAINT pk_bat primary key(idBat))");
		alterTable($link);
		}

	if(isset($_GET['videM'])){
		mysqli_query($link, "TRUNCATE Mesure;");}
	if(isset($_GET['videC'])){
		mysqli_query($link, "TRUNCATE Capteur;");}
	if(isset($_GET['videB'])){
		mysqli_query($link, "TRUNCATE Batiment;");}

	if(isset($_GET['close'])){
		$_SESSION['logged'] = null; 				//To securit this page : disable the session (by right)
		header('Location: Index.html');
	}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="author" content="MO" />
   <meta name="description" content="SAE23" />
   <meta name="keywords" content="HTML, CSS, PHP" />
   <title> Gestion </title>
   <link rel="stylesheet" type="text/css" href="./Styles/styleRWD.css" />
   <link rel="stylesheet" type="text/css" href="./Styles/styleRWD-Gestion.css" />
 </head>

 <body>
  <header>
    <h1> Administration de la base de données </h1>
	<div class="session">Session : <?php echo $login ?>					<!--To print the session-name on top-left of the website-->
		<form method="get">
			<input type="submit" name="close" value="Fermer la session">
		</form>
	</div>
  </header>
  <nav>
    <ul>
		<li><a href="./Index.html" > Acceuil </a></li>
		<li><a href="#" class="first"> Gestion </a></li>
	</ul>
  </nav>
  <section id="first">
  <p>Pour interagir avec l'<b>ensembles</b> des tables MySQL à la fois :</p>
	<form action="./Gestion.php" method="get">
		<input type="submit" name="dropAll" value="drop des tables">
		<input type="submit" name="restorAll" value="réstauration de toutes les tables">
		<input type="submit" name="vidageAll" value="Vidage de toutes les tables">
	</form>

  <p>Interraction table des <b>mesures</b></p>
  <form method="get">
	<input type="submit" name="dropM" value="Détruire la table">
	<input type="submit" name="restorM" value="Réstaurer la table">
	<input type="submit" name="videM" value="Vider la table">
  </form>

  <p>Interraction table des <b>capteurs</b></p>
  <form method="get">
	<input type="submit" name="dropC" value="Détruire la table">
	<input type="submit" name="restorC" value="Réstaurer la table">
	<input type="submit" name="videC" value="Vider la table">
  </form>

  <p>Interraction table des <b>batiments</b></p>
  <form method="get">
	<input type="submit" name="dropB" value="Détruire la table">
	<input type="submit" name="restorB" value="Réstaurer la table">
	<input type="submit" name="videB" value="Vider la table">
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
