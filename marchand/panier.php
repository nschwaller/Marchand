<!DOCTYPE html>
<html>
<head>
	<link href="acceuil.css" rel="stylesheet" />
</head>
<body>
<?php
require_once('classe.php');
	session_start();
	
?>
<a href="acceuil.php" style="color:#FFFFFF" > Retourner a l'accueil </a> 
</br>
</br>
<?php
			if((!isset($_SESSION["panier"]))||($_SESSION["panier"]==""))
			{
				echo "Aucun article dans le panier";
			}
			else
			{
				$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
				
				/*foreach($_SESSION["panier" as $key=>$value]
				{
				
				}*/
				
				$panier=$_SESSION["panier"];
				
				if(sizeof($panier)==0)
				{
					$req="SELECT * FROM CD WHERE 0";
					$prix="SELECT prixCD FROM CD WHERE 0";
				}
				else
				{
					$req="SELECT * FROM CD WHERE ";
					$prix="SELECT prixCD FROM CD WHERE ";
				}
				
				//var_dump($panier);
				//echo "<br/> <br/> <br/>";
					for($i=0;$i<sizeof($panier);$i++)
					{
						if($i==(sizeof($panier)-1))
						{
							$req.="codeCD=".$panier[$i]->codeCD;
							$prix.="codeCD=".$panier[$i]->codeCD;
						}
						else
						{
							$req.="codeCD=".$panier[$i]->codeCD." OR ";
							$prix.="codeCD=".$panier[$i]->codeCD." OR ";
						}	
					}
					//echo $req;
					//echo $prix;
					$resu=mysqli_query($maCo,$req);	
					//echo $req;
					//$resuP=mysqli_query($maco,$prix);
					$i=0;
					echo "<table border='2'>";
						while($tableauLigne=mysqli_fetch_array($resu))
						{
							echo "<tr>";
							echo "<td> <img src=\"image/".$tableauLigne["photoCD"]."\" width=60 height=60 /> </td>";
							echo "<td>".$tableauLigne["nom"]."</td>";
							echo "<td>".$panier[$i]->quantite." exemplaire(s) </td>";
							echo "<td>".$tableauLigne["prixCD"]."€ </td>";
							//echo "<td>".." </td>";	
							$i=$i+1;							
						}
						echo "</tr>";
					echo "</table>" ;
					$resultat=mysqli_query($maCo,$prix);
					//$tableauL=mysqli_fetch_array($resultat);
					$i=0;
					$prix=0;
					while($tableauL=mysqli_fetch_array($resultat))
					{
						$prix=$prix+($tableauL["prixCD"]*$panier[$i]->quantite);
						$i=$i+1;
					}
					echo "Le prix total est ".$prix." euro ";
				
				
						
				mysqli_close($maCo);
				
				
				echo "</tr>";
				echo "</table>" ;
				echo '<form name="formulaire" action="" method="POST"><input type="submit" class="bouton" name="ok" value="acheter" /></form>';	  
				if(isset($_POST["ok"]))
				{
					if(isset($_SESSION["id"]))
					{						
						header("Location: ./sur.php"); 
						exit;
					}
					else
					{
						header("Location: ./login.php"); 
						exit;
					}
				}
			}			
		?>
			
</body>
</html>
