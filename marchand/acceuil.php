<!DOCTYPE html>
<html>
<head>
	<title>MusiCD</title>
	<link href="acceuil.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="jq.js"></script>
</head>
<script>
window.setInterval("envoyerRequete()",2000);
</script>
<body>
<?php
require_once('classe.php');
	session_start();
	
	//var_dump($_SESSION);
?>


<div id="labar">
	<div id="barre">
		<div id="y">
		<h1> Menu </h1>
		</div>
		<div id="t">
		Voir par ordre alphabétique les:
		</div>
		<div id="sele">	

				<a href="page.php?selection=Artiste"  class="ab"> Artistes</a>
				<br/>
				<br/>
				<a href="page.php?selection=Genre"  class="ab"> Genres</a>
				<br/>
				<br/>
				<a href="page.php?selection=CD"  class="ab"> Titres</a>
		</div> 
	</div>
	<div>
		<div id="pres">
			<div id="titrea">
				<h1> MusiCD </h1>
			</div>
			<div id="demo">
			</div>
		</div>
		<div class="le">
			<div class="blanc">
			</div>
			<div id="tout">		
				<div id="haut">
					<div id="login">
						
						<?php
							if(isset($_POST["co"]))
							{
								header("Location: ./login.php"); 
								exit;
							}
							if(isset($_POST["ins"]))
							{
								header("Location: ./inscription.php"); 
								exit;
							}						
						?>		
						<form name="formulaire" action="" method="POST">
						<?php 
							if(!isset($_SESSION["login"]))
							{
								echo "<input type='submit' name='co' class='bouton'	value='Connexion'/>";
								echo '<input type="submit" name="ins" class="bouton" value="Inscription"/>';
							}
							else
							{
								echo "<input type='button' name='sup' id='supprimer' class='bouton' value='Deconnexion'/>";
							}
						?>	
						</form>						
					</div>
					<div id="panier">
						<a href="./panier.php"><img src="./image/panier.png" width="40" height="40" /> </a>
					</div>
				</div>

				
			</div>
		</div>
		<div class="le">
			<div class="blanc"> </div>
			
				<form name="forme" action="chercher.php" id="recherche" class="formulaire" method>
					Chercher un article(artiste, titre...) :  <input class="champ" type="text" name="cherche" placeholder="Chercher..."/>	
					<input class="bouton" type="submit" value="OK" />                    
				</form>
			
		</div>
		<div id="texte">
			<b>MusiCD, boutique de CD en ligne propose un large choix d'artiste pour vous servir. Vous pourrez trouver différents genre allant du rock, metal à la musique classique
			sans oublié la pop et le rap. Des goûts pour tous, grand et petit. Nous proposons aussi une gamme enfant, pour les berceuses et comptine.</b>
		
		</div>	
	</div>
</div>
</body>
</html>