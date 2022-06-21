#!/opt/lampp/bin/php
<?php
$i = 0;
$a = 0;
while ($i ==0){
	$a = $a + 1;
	//MQTT treatment to get message's tags alone
	$message = shell_exec('mosquitto_sub -h localhost -u user -P passroot -t iut/BatE -C 1');
	$data = json_decode($message);
	$date = date ("Y-m-d");
	$time = date ("H:i:s");
	$idValue = $data->id;
	$idCap = $data->cap;
	$value = $data->value;
	$idBat = '';
	echo "$message";
	echo "$value";
	//sensor treatment to get all sensor tags for the BDD
	if ($idCap == '1'){ 			#All other sensor's tags are given by the sensor ID
		$typCap = 'Temp';				#necessary to the type of measur : CO2, lux, or °C/°F
		$idBat = 'E';
		$room = 'E208';					#A part of the exact location of this sensor
	} elseif ($idCap == '2'){
		$typCap = 'Temp';
		$idBat = 'E';
		$room = 'E104';
	} elseif ($idCap == '3'){
		$typCap = 'CO2';
		$idBat = 'E';
		$room = 'E208';
	} elseif ($idCap == '4'){
		$typCap = 'CO2';
		$idBat = 'E';
		$room = 'E104';
	}

	if ($idBat == 'E') {			#All other batiment's tags are given by the sensor ID
		$gestBat = 'GMAN';			#Usefull to contact the batiment's "administrator"
		$nomBat = 'RT';				#"RT", "CS" for us; like "R&D", "Production" for any entreprise
	}

	//Connection and sending tags and values into our BDD
	$link = mysqli_connect("localhost","admin@localhost","","test"); #connecting to our DB
	mysqli_query($link, "INSERT INTO Mesure VALUES('$idValue','$idCap','$typCap','$date','$time','$value')"); #sending of our values and tags in the good table of our BDD
	mysqli_query($link, "INSERT INTO Capteur VALUES('$idCap','$typCap','$room','$idBat')");
	mysqli_query($link, "INSERT INTO Batiment VALUES('$idBat','$nomBat','$gestBat')");
	echo "Publication du message OK \n";
}
?>
