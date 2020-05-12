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
					echo $_GET["selection"];
				?>
			</h1>
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
	<div id="genre" >
		<?php
			$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		
			$req="SELECT * FROM ".$_GET["selection"]  ." ORDER BY nom ASC";
			//echo $req;
			$resu=mysqli_query($maCo,$req);
			
			//$chiffre=mysqli_num_rows($resu);
			echo "<form name='formulaire' action='ajoutc.php' method='POST'>";
			echo "<table border='2'>";
			while($tableauLigne=mysqli_fetch_array($resu))
			{
				echo "<tr>";
				echo "<td>".$tableauLigne["nom"]."</td>";
				if($_GET["selection"]=="CD")
				{
					echo "<td> <img src=\"image/".$tableauLigne["photoCD"]."\" width=60 height=60 /> </td> <td>".$tableauLigne["descriptionCD"]."</td>";
					echo "<td>".$tableauLigne["prixCD"]."€ </td>";
					echo "<td> <input type='number' name='ui".$tableauLigne["codeCD"]."' placeholder='Nombre de CD souhaité'/> </td> <td>".$tableauLigne["stockCD"]." en stock </td>";
					echo "<td> <button name='id' value='".$tableauLigne["codeCD"]."'> Ajouter  </button> </td>";
				}
			echo "<form>";
				if($_GET["selection"]=="Artiste")
				{
					echo "<td> <a href='titre.php?id=".$tableauLigne["codeA"]."'  style='color:#00F5F5'> Voir  </a> </td>";
				}
				if($_GET["selection"]=="Genre")
				{
					echo "<td> <a href='titre.php?id=".$tableauLigne["codeG"]."'  style='color:#00F5F5'> Voir  </a> </td>";
				}
				$_SESSION["page"]="";
			}					
			echo "</tr>";
			echo "</table>" ;
			mysqli_close($maCo);		 
		?>
	</div>
</body>
</html>