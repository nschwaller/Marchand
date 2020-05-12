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
	<?php
		
		$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
			
		$req="SELECT stockCD FROM CD WHERE codeCD = ".$_POST["id"];
		//echo $req;
		$resu=mysqli_query($maCo,$req);
		$tableauLigne=mysqli_fetch_array($resu);
			
		if(!isset($_SESSION["panier"]))
		{
			$panier=array();
		}
		else
		{
			$panier=$_SESSION["panier"];
		}
		$codeRetour=$_POST["id"];
		$exist=false;
		$i=0;
		foreach($panier as $lepanier)
		{
			if($lepanier->codeCD==$_POST["id"])
			{
				$exist=true;
				break;
			}
			
			$i++;
		}
		echo $exist;
		if($exist)
		{
			$panier[$i]->quantite=$_POST["ui".$_POST["id"]];
			echo $panier[$i]->quantite;
			//echo $_POST["ui".$_POST["id"]];
		}
		else
		{
			if(($tableauLigne["stockCD"]<$_POST["ui".$_POST["id"]])||($_POST["ui".$_POST["id"]]<0))
			{
				
			}
			else
			{
				$p = new CD();
				if($_POST["ui".$_POST["id"]]=="")
				{
					$p->quantite=0;
				}
				else
				{
					$p->quantite=$_POST["ui".$_POST["id"]];
				}
				$p->codeCD=$_POST["id"];
				$panier[]=$p;
				$codeRetour=$p->codeCD;
			}
		}
		$_SESSION["panier"]=$panier;
		var_dump($_SESSION["panier"]);
		//echo $_SESSION["panier"][sizeof($_SESSION["panier"])-1]->quantite;
		if((!isset($_SESSION["page"]))||($_SESSION["page"]==""))
		{
			header("Location: ./acceuil.php"); 
			exit;
			
		}
		else
		{
			header("Location: ".$_SESSION["page"]."?id=".$codeRetour); 
			exit;
		}
		?>
</body>
</html>