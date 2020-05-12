<!DOCTYPE html>
<html>
<head>
	<link href="acceuil.css" rel="stylesheet" />
</head>
<body>
<?php
	session_start();
	require_once('classe.php');
?>
<div id="titre">
	<h1> LOGIN </h1> 
</div>
<div id="creation" class="list-group">
	<form name="formulaire" action="" name="login" method="POST">
		<div id="eh">
			
			<input type="text" class="cham" name="login" placeholder="Login..."/> 
		</div>
		<div id="eh">
		
			<input type="password" class="cham" name="mdp" placeholder="Mot de Passe..."/>
		</div>
		<div id="but">
			<input type="submit" name="ok" class="bouton" value="Valider"/>
		</div>
	</form>
</div>
<?php
if(isset($_POST["ok"]))
{
	$maConnexion=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		
	$req="SELECT mdpUser FROM Utilisateur WHERE loginUser='".$_POST["login"]."'";
	//echo $req;
	
	$reqq="SELECT codeUser FROM Utilisateur WHERE loginUser='".$_POST["login"]."'";
	//echo $reqq;
	
	$resu=mysqli_query($maConnexion,$req);
	
	$resuu=mysqli_query($maConnexion,$reqq);
		
	$tableau=mysqli_fetch_array($resu);
	
	$tableaul=mysqli_fetch_array($resuu);

	
	//$mdp=password_hash($_POST["lucky"],PASSWORD_DEFAULT);	
	
	
	if(password_verify ( $_POST["mdp"] , $tableau["mdpUser"] ))
	{
		echo "OUI !";
		$_SESSION["login"]=$_POST["login"];
		$_SESSION["id"]=$tableaul["codeUser"];
		if(isset($_SESSION["panier"]))
		{
			$req="SELECT codeCD,quantite FROM apaprtient INNER JOIN Panier ON Panier.codeP = apaprtient.codeP WHERE Panier.id =".$_SESSION["id"];
			$resu=mysqli_query($maConnexion,$req);	
			$panier=$_SESSION["panier"];
			
			
			while($ligne=mysqli_fetch_array($resu))
			{
				$exist=false;
				$i=0;
				foreach($panier as $lepanier)
				{
					if($lepanier->codeCD==$ligne["codeCD"])
					{
						$exist=true;
						break;
					}
					
					$i++;
				}
				//echo $exist;
				if($exist)
				{
				}
				else
				{
					$p=new CD;
					$p->quantite=$ligne["quantite"];
					$p->codeCD=$ligne["codeCD"];
					$panier[]=$p;
					
					$_SESSION["panier"]=$panier;		
				}
			}
		}
		else
		{
			$req="SELECT codeCD,quantite FROM apaprtient INNER JOIN Panier ON Panier.codeP = apaprtient.codeP WHERE Panier.id =".$_SESSION["id"];
			$resu=mysqli_query($maConnexion,$req);
			
			$panier=array();
			while($ligne=mysqli_fetch_array($resu))
			{
				$p=new CD;
				$p->quantite=$ligne["quantite"];
				$p->codeCD=$ligne["codeCD"];
				$panier[]=$p;
			}
			$_SESSION["panier"]=$panier;
		}
		//var_dump ($panier);
		header("Location: ./acceuil.php"); 
		exit;
	}
	else
	{
		echo "Vous vous êtes trompé de nom utilisateur ou mot de passe !";
	}	
}
?>
</body>
</html>