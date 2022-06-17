#!/opt/lampp/bin/php
<?php
//MQTT treatment to get message's tags alone
$message = shell_exec(`mosquitto_sub -h localhost -u root -p passroot -t teste -C 1`);
$date = echo `date +%d/%m`
$time = echo `date %H:%M:%S`
$idValue = $message | jq '.id'
$idCap = $message | jq '.cap'
$value = $message | jq'.value'

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
mysqli_connect("localhost","root","passroot","capteurs"); #connecting to our BDD
mysqli_request(INSERT TO mesure VALUES('$idValue','$idCap','$typCap','$date','$time','$value'); #sending of our values and tags in the good table of our BDD
mysqli_request(INSERT TO Capteur VALUES('$idCap','$typCap','$room','$idBat');
mysqli_request(INSERT TO batiment VALUES('$idBat','$nomBat','$gestBat');
?>
