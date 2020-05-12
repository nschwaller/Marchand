<!DOCTYPE html>
<html>
<head>
	<link href="acceuil.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="jq.js"></script>
</head>
<script>
window.setInterval("envoyerRequete()",2000);
</script>
<body>
<?php
	session_start();
?>
	<div id="pres">
		<div id="titre">
			<h1>
				<?php
					echo $_GET["cherche"];
				?>
			</h1>
		</div>
		<div id="demo">
		</div>
	</div>
	<a href="acceuil.php" style="color:#FFFFFF" > Retourner a l'accueil </a> 
	
	<br/>
	<br/>
	<br/>
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
							echo "<input type='button' id='supprimer' name='sup' class='bouton' value='Deconnexion'/>";
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
	<div id="artiste">
		<?php
			$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		
			$req="SELECT nom,codeA FROM Artiste WHERE nom LIKE '%".$_GET["cherche"]."%'";
			//echo $req;
			$resu=mysqli_query($maCo,$req);
			
			$chiffre=mysqli_num_rows($resu);
	
			if($chiffre==0)
			{
				echo "Aucun artiste du nom de \"".$_GET["cherche"]."\" trouvé";
			}
			else
			{		
				echo "<table border='2'>";
					while($tableauLigne=mysqli_fetch_array($resu))
					{
						echo "<tr>";
						echo "<td>".$tableauLigne["nom"]."</td>";
						echo "<td> <a href='titrea.php?id=".$tableauLigne["codeA"]."' style='color:#00F5F5'> Voir  </a> </td>";
						
					}
					echo "</tr>";
				echo "</table>" ;
				mysqli_close($maCo);
			}
			
		?>
	</div>
	<br/>
	<div id="CD">
		<?php
			$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		
			$req="SELECT codeCD,nom,descriptionCD,photoCD,stockCD FROM CD WHERE nom LIKE '%".$_GET["cherche"]."%' OR descriptionCD LIKE '%".$_GET["cherche"]."%'" ;
			//echo $req;
			$resu=mysqli_query($maCo,$req);
			
			$chiffre=mysqli_num_rows($resu);
	
			if($chiffre==0)
			{
				echo "Aucun titre ou description avec \"".$_GET["cherche"]."\" trouvé";
			}
			else
			{	echo "<form name='formulaire' action='ajoutc.php' method='POST'>";	
				echo "<table border='2'>";
					while($tableauLigne=mysqli_fetch_array($resu))
					{
						//echo $tableauLigne["photoCD"];
						echo "<tr>";
						echo "<td> <img src=\"image/".$tableauLigne["photoCD"]."\" width=60 height=60 /> </td><td>".$tableauLigne["nom"]."</td> <td>".$tableauLigne["descriptionCD"]."</td>";
						echo "<td> <input type='number' name='ui".$tableauLigne["codeCD"]."' placeholder='Nombre de CD souhaité'/> </td> <td>".$tableauLigne["stockCD"]." en stock </td>";
						echo "<td> <button name='id' value='".$tableauLigne["codeCD"]."'> Ajouter  </button> </td>";				
					}
				echo "</tr>";
				echo "</table>";
				echo "</form>";
				mysqli_close($maCo);
			}
		?>
	</div>
	<br/>
	<div id="genre">
		<?php
			$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		
			$req="SELECT nom FROM Genre WHERE nom LIKE '%".$_GET["cherche"]."%'" ;
			//echo $req;
			$resu=mysqli_query($maCo,$req);
			
			$chiffre=mysqli_num_rows($resu);
	
			if($chiffre==0)
			{
				echo "Aucun genre \"".$_GET["cherche"]."\" trouvé";
			}
			else
			{		
				echo "<table border='2'>";
					while($tableauLigne=mysqli_fetch_array($resu))
					{
						echo "<tr>";
						echo "<td>".$tableauLigne["nom"]."</td>";
						echo "<td> <a href='titreg.php?id=".$tableauLigne["codeG"]."' style='color:#00F5F5'> Voir  </a> </td>";					
					}
					echo "</tr>";
				echo "</table>";
				mysqli_close($maCo);
			}
		?>
	</div>
</body>
</html>