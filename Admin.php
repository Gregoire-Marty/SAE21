<?php
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
	}
	if(isset($_GET['vidageAll'])){
		mysqli_query($link, "TRUNCATE Batiment;");
		mysqli_query($link, "TRUNCATE Capteur;");
		mysqli_query($link, "TRUNCATE Mesure;");
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
		alterTable();
		}
	if(isset($_GET['restorC'])){
		mysqli_query($link, "CREATE TABLE Capteur(
		idCapteur numeric(5) NOT NULL,
		typeCapteur varchar(20) NOT NULL,
		numSalle varchar(4),
		idBat varchar(1) NOT NULL,
		CONSTRAINT pk_capteur primary key(idCapteur,typeCapteur)
		);");
		alterTable();
		}
	if(isset($_GET['restorB'])){
		mysqli_query($link, "CREATE TABLE Batiment(
		idBat varchar(1) NOT NULL,
		nomBat varchar(30) NOT NULL,
		gestBat varchar(5) NOT NULL,
		CONSTRAINT pk_bat primary key(idBat))");
		alterTable();
		}

	if(isset($_GET['videM'])){
		mysqli_query($link, "TRUNCATE Mesure;");}
	if(isset($_GET['videC'])){
		mysqli_query($link, "TRUNCATE Capteur;");}
	if(isset($_GET['videB'])){
		mysqli_query($link, "TRUNCATE Batiment;");}
?>
