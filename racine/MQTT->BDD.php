#!/opt/lampp/bin/php
<?php
//MQTT treatment to get message's tags alone
$message = shell_exec('mosquitto_sub -h localhost -u root -P passroot -t teste -C 1');
$data = json_decode($message);
$date = date ("d/m");
$time = date ("H:i:s");
$idValue = $data->id;
$idCap = $data->cap;
$value = $data->value;
$idBat = '';

//sensor treatment to get all sensor tags for the BDD
if ($idCap == '1'){ 			#All other sensor's tags are given by the sensor ID
	$typCap = '';				#necessary to the type of measur : CO2, lux, or °C/°F
	$idBat = 'E';
	$room = '';					#A part of the exact location of this sensor
} elseif ($idCap == '2'){
	$typCap = '';
	$idBat = 'E';
	$room = '';
} elseif ($idCap == '3'){
	$typCap = '';
	$idBat = 'E';
	$room = '';
} elseif ($idCap == '4'){
	$typCap = '';
	$idBat = 'E';
	$room = '';
}

if ($idBat == 'E') {			#All other batiment's tags are given by the sensor ID
	$gestBat = 'GMAN';			#Usefull to contact the batiment's "administrator"
	$nomBat = 'RT';				#"RT", "CS" for us; like "R&D", "Production" for any entreprise
}

//Connection and sending tags and values into our BDD
$link = mysqli_connect("localhost","admin","","test"); #connecting to our DB
mysqli_query($link, "INSERT TO Mesure VALUES('$idValue','$idCap','$typCap','$date','$time','$value')"); #sending of our values and tags in the good table of our BDD
mysqli_query($link, "INSERT TO Capteur VALUES('$idCap','$typCap','$room','$idBat')");
mysqli_query($link, "INSERT TO Batiment VALUES('$idBat','$nomBat','$gestBat')");
?>
