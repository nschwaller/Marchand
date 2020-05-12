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
	require_once('classe.php');
?>
	<div id="pres">
		<div id="titre">
			<?php 
				$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
				
				$reqq="SELECT nom FROM Artiste WHERE codeA = ".$_GET["id"];
				//echo $reqq;
				$resuu=mysqli_query($maCo,$reqq);
				$tableau=mysqli_fetch_array($resuu);
				echo "<h1>".$tableau["nom"]."</h1>";
				mysqli_close($maCo);	
			?>
		</div>
		<div id="demo">
		</div>
	</div>
	<a href="acceuil.php" style="color:#FFFFFF" > Retourner a l'accueil </a> 
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
		
			$req="SELECT * FROM CD WHERE codeA = ".$_GET["id"];
			//echo $req;
			$resu=mysqli_query($maCo,$req);
			
			$chiffre=mysqli_num_rows($resu);
	
			//echo "Aucun artiste du nom de \"".$_GET["cherche"]."\" trouvĂ©";	
			echo "<form name='formulaire' action='ajoutc.php' method='POST'>";
			echo "<table border='2'>";
			while($tableauLigne=mysqli_fetch_array($resu))
			{
				echo "<tr>";
				echo "<td> <img src=\"image/".$tableauLigne["photoCD"]."\" width=60 height=60 /> </td>";
				echo "<td>".$tableauLigne["nom"]."</td> <td>".$tableauLigne["descriptionCD"]."</td>";
				echo "<td>".$tableauLigne["prixCD"]."€ </td>";
				echo "<td> <input type='number' name='ui".$tableauLigne["codeCD"]."' placeholder='Nombre de CD souhaité'/> </td> <td>".$tableauLigne["stockCD"]." en stock </td>";
				echo "<td> <button name='id' value='".$tableauLigne["codeCD"]."'> Ajouter  </button> </td>";
				$_SESSION["page"]="titrea.php";
				
			}
			echo "</tr>";
			echo "</table>" ;
			echo "</form>";
			mysqli_close($maCo);	
		?>
	</div>
</body>
</html>