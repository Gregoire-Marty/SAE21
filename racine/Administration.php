<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="author" content="MO" />
   <meta name="description" content="SAE23" />
   <meta name="keywords" content="HTML, CSS" />
   <title>Administration</title>
   <link rel="stylesheet" type="text/css" href="./Styles/styleRWD.css" />
 </head>
 
 <body>
  <header>
   <h1> Administration </h1>
  </header>
  <nav>
    <ul>
		<li><a href="./Index.html" > Accueil </a></li>
		<li><a href="#" class="first"> Administration </a></li>
		<li><a href="./Consultation.html" > Consultation </a></li>
	</ul>
  </nav>
  
  <section id="first">
  <form method="post" class="form-example">
  <div class="form-example">
    <label for="login">Login : </label>
    <input type="text" name="login" id="login" required>
  </div>
  <div class="form-example">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" required>
  </div>
  <div class="form-example">
    <input type="submit" value="Subscribe!">
  </div>
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

<?php
	$link = mysqli_connect("localhost","admin@localhost","","test");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$login = $_POST["login"]; 
		$mdp = $_POST["password"];

	 	if (!isset($login)){
		  die("S'il vous plaît entrez votre nom d'utilisateur");
		}
		if (!isset($mdp)){
		  die("S'il vous plaît entrez votre mot de passe");
		}
		//$username = mysqli_real_escape_string($link, htmlspecialchars($_POST['username']))
		
		$request = mysqli_query($link, "SELECT count(*) FROM Administration where login ='$login' and motDePasse ='$mdp' ");
		$count = mysqli_fetch_array($request);['count(*)'];
		printf ("%s\n", $count[0]);
		if($count[0] != 0){
			$_SESSION['login'] = $login;
			header('Location: ./Gestion.php');
		}
	}
?>
