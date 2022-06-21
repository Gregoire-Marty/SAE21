<?php
	$error = isset($_GET['error']) ? $_GET['error'] : '';			//Recover the error's ID in URL
	$password = isset($_GET['password']) ? $_GET['password'] : '';	//Recover the wrong password in URL
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="author" content="MO" />
   <meta name="description" content="SAE23" />
   <meta name="keywords" content="HTML, CSS" />
   <title>Administration</title>
   <link rel="stylesheet" type="text/css" href="./Styles/styleRWD_admin.css" />
 </head>
 
 <body>
  <header>
   <h1> Administration </h1>
  </header>
  <nav>
    <ul>
		<li><a href="./Index.html" > Accueil </a></li>
		<li><a href="#" class="first"> Administration </a></li>
		<li><a href="./Consultation.php" > Consultation </a></li>
	</ul>
  </nav>
  
  <section id="first">
	  
	  
  	<div class="login-box">
  <h2>Login</h2>
  <form action="Connexion.php" method="post" class="form-example">
    <div class="user-box">
	<label>Username</label>
      <input type="text" name="login" required="">
      
    </div>
    <div class="user-box">
	<label>Password</label>
      <input type="password" name="password" required="">
      
    </div>
    <a href="./Gestion.html">
        <input type="submit" value="Connection">
    </a>
    </a>
  </form>
</div>
	  
	  
  
	  
<?php	
	switch ($error) { //error management
		case 1:       //error 1
		echo "<div class=\"error\">Le mot de passe <b>$password</b> est invalide</div>";  //Print this messag on html page
		break;        //stop managing the error 1
		
		case 2:
		echo "</div class=\"error\"><b>MERCI DE NE PAS FORCER NOTRE SITE !</b></div>";  //div class error for css
		break;
	}				  //Stop error's management
?>	
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


