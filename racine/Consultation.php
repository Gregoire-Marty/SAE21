<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="author" content="MO" />
   <meta name="description" content="SAE14" />
   <meta name="keywords" content="HTML, CSS" />
   <title>Consultation</title>
   <link rel="stylesheet" type="text/css" href="./Styles/styleRWD.css" />
   <link rel="stylesheet" type="text/css" href="./styles/tableau.css" />
 </head>
 
 <body>
  <header>
    <h1> consultation </h1>
  </header>
  <nav>
    <ul>
		<li><a href="./Index.html" > Acceuil </a></li>
		<li><a href="./Administration.html" > Administration </a></li>
		<li><a href="#" class="first"> Constulation </a></li>
		
		
	</ul>
  </nav>
  
  <section id="first">
  

 
  <table style="display:inline">
<caption> <strong> batiment 1 </strong> </caption>
  <tr>
	<th> Mesure  </th>
	<th> Type de mesure </th>
	<th> Horaire </th>
  </tr>
  
  <?php
  	$connexion = mysqli_connect("localhost","root@localhost","rt1");
  	mysqli_select_db ("sae", $connexion);
    
    $r104 = mysqli_query("SELECT valeur,typeCapteur,horaire FROM Mesure,Capteur WHERE numSalle = "E104"");
    
    $r208 = mysqli_query("SELECT valeur,typeCapteur,horaire FROM Mesure,Capteur WHERE numSalle = "E208"");
  	

    
	while ($data = mysqli_fetch_array($r104))
	{
		echo "<tr> <td>$data['valeur']</td> <td>$data['typeCapteur']</td><td>$data['horaire']</td> </tr"
	
	}	
		
	?>
	
   </table>
 
   
 
   
    <table style="display:inline">
<caption> <strong> batiment 2 </strong> </caption>
  <tr>
	<th> Mesure  </th>
	<th> Type de mesure </th>
	<th> Horaire </th>
  </tr>
  	<td>  case vide </td>
	<td> case vide  </td>
	<td> case vide  </td>
   </table>
 
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
