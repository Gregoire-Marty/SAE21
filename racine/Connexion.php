<?php
	$link = mysqli_connect("localhost","admin@localhost","","test");	//connecting to the DB, but in a variable (link)
	if ($_SERVER["REQUEST_METHOD"] == "POST") {							//Checke the method of html-form end do...
		$login = $_POST["login"]; 										//Recover command in variable
		$mdp = $_POST["password"];

	 	if (!isset($login)){											//If $login is empty...
		  die("Merci de saisir un login");								//Print this message (and don't go anywere)
		}
		if (!isset($mdp)){
		  die("Merci de saisir un mot de passe");
		}
		//$username = mysqli_real_escape_string($link, htmlspecialchars($_POST['username']))

		//recherch in MySQL, at table Administration, the login and password keyed (how many row corresponding) :
		$request = mysqli_query($link, "SELECT count(*) FROM Administration where login ='$login' and motDePasse ='$mdp' ");
		$count = mysqli_fetch_array($request);['count(*)'];
		if($count[0] == 0){												//If there is no row (0) with this login AND password
			header('Location: Administration.php?error=1&password='.$mdp); //redirection to the previous page
		}
		else{
			session_start();											//Else if, start a session
			$_SESSION['login'] = $login;								//Recover command in variable
			$_SESSION['password'] = $mdp;
			$_SESSION['logged'] = true;									//To securit the next page, this one allow to open a session
			header('Location: Gestion.php');
		}
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
   <title> Connexion en cour... </title>
   <link rel="stylesheet" type="text/css" href="./Styles/styleRWD.css" />
 </head>
</html>

