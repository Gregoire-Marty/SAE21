<!DOCTYPE html>
<?php
	$i = 0;
	$j = 0;
	$nb = 5;
	$host = 'localhost';
	$dbname = 'test';
	$username = 'root';
	$password = '';
	
	$dsn = 
	"mysql:host=$host;dbname=$dbname";
	
	try{
		$pdo = new PDO($dsn,$username,$password);
		$stmt = $pdo->query("SELECT * FROM Mesure WHERE idCapteur = '1' OR idCapteur = '3'");
		$stmt1 = $pdo->query("SELECT * FROM Mesure WHERE idCapteur = '2' OR idCapteur = '4'");
		if($stmt == false){
			die("Erreur");
			}
		}catch (PDOException $e){
			echo $e->getMessage();
		}
?>


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
		<li><a href="./Index.html" > Accueil </a></li>
		<li><a href="./Administration.html" > Administration </a></li>
		<li><a href="#" class="first"> Consultation </a></li>
		
		
	</ul>
  </nav>
  
  <section id="first">
  

 
  <table style="display:inline">
<caption> <strong> Salle E104 </strong> </caption>
  <tr>
	<th> Mesure  </th>
	<th> Type de mesure </th>
	<th> Horaire </th>
  </tr>
  
  <?php
  	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
  	 <?php if ($i < $nb) : ?>
    <tr>
		<td><?php echo htmlspecialchars($row['valeur']); ?></td>
		<td><?php echo htmlspecialchars($row['typeCapteur']); ?></td>
		<td><?php echo htmlspecialchars($row['horaire']); ?></td>
	</tr>
	<?php endif; endwhile; ?>
	
   </table>
 
   
 
   
     <table style="display:inline">
<caption> <strong> Salle E208 </strong> </caption>
  <tr>
	<th> Mesure  </th>
	<th> Type de mesure </th>
	<th> Horaire </th>
  </tr>
  
  <?php
  	while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) : ?>
  	 <?php if ($j < $nb) : ?>
    <tr>
		<td><?php echo htmlspecialchars($row['valeur']); ?></td>
		<td><?php echo htmlspecialchars($row['typeCapteur']); ?></td>
		<td><?php echo htmlspecialchars($row['horaire']); ?></td>
	</tr>
	<?php endif; endwhile; ?>
	
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
