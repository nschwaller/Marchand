<a href="./panier.php"><img src="./image/panier.png" width="40" height="40" /> </a>
<?php
require_once('classe.php');
	session_start();	
if((!isset($_SESSION["panier"]))||($_SESSION["panier"]==""))
			{
				echo "0€";
			}
			else
			{
				$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
				
				$panier=$_SESSION["panier"];
				
				if(sizeof($panier)==0)
				{
					$prix="SELECT prixCD FROM CD WHERE 0";
				}
				else
				{
					$prix="SELECT prixCD FROM CD WHERE ";
				}
				
				//var_dump($panier);
				//echo "<br/> <br/> <br/>";
				for($i=0;$i<sizeof($panier);$i++)
				{
					if($i==(sizeof($panier)-1))
					{
						$prix.="codeCD=".$panier[$i]->codeCD;
					}
					else
					{
						$prix.="codeCD=".$panier[$i]->codeCD." OR ";
					}	
				}
				
				$resultat=mysqli_query($maCo,$prix);
				//$tableauL=mysqli_fetch_array($resultat);
				$i=0;
				$prix=0;
				while($tableauL=mysqli_fetch_array($resultat))
				{
					$prix=$prix+($tableauL["prixCD"]*$panier[$i]->quantite);
					$i=$i+1;
				}
				echo $prix."€ ";
			}
?>