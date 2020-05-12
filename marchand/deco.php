
<?php
require_once('classe.php');
session_start();	
	if(isset($_SESSION["panier"]))
		{
			$maConnexion=mysqli_connect("172.19.0.24","root","0550002D","marchand");
			$pani="INSERT INTO Panier (id) VALUES (".$_SESSION["id"].")";
			//echo $pani;
			$resuu=mysqli_query($maConnexion,$pani);
			$idpanier="SELECT MAX(codeP) AS leDernierCodePanier FROM Panier WHERE id =".$_SESSION["id"];
			//echo $idpanier;
			$re=mysqli_query($maConnexion,$idpanier);
			$tableauli=mysqli_fetch_array($re);
			$user="UPDATE Utilisateur SET codeP =".$tableauli["leDernierCodePanier"]." WHERE codeUser=".$_SESSION["id"];
			//echo $user;
			$r=mysqli_query($maConnexion,$user);

			$panier=$_SESSION["panier"];
			//var_dump($panier);
			foreach($panier as $value)
			{
				$req="INSERT INTO apaprtient (codeCD,codeP,quantite) VALUES (".$value->codeCD.",".$tableauli["leDernierCodePanier"].",".$value->quantite.")";
				echo $req;
				$resu=mysqli_query($maConnexion,$req);
			}
		}
	session_destroy();
?>