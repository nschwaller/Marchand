<head>
	<link href="acceuil.css" rel="stylesheet" />
</head>
<?php
	require_once('classe.php');
	session_start();
?>
etes vous sur de votre achat?
<form name="formulaire" action="" method="POST">
	<input type="submit" class="bouton" name="ok" value="acheter" />
	<input type="submit" class="bouton" name="non" value="anuler" />
</form>

<?php
	if(isset($_POST["ok"]))
	{
		//$panier=array();
		$panier=$_SESSION["panier"];
		$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		for($i=0;$i<sizeof($panier);$i++)
		{
			$req="UPDATE CD SET stockCD = stockCD - ".$panier[$i]->quantite." WHERE codeCD =".$panier[$i]->codeCD;
			//echo $req;
			$resu=mysqli_query($maCo,$req);
		}
		
		$_SESSION["panier"]="";
		header("Location: ./acceuil.php"); 
		exit;
	}
	if(isset($_POST["non"]))
	{
		header("Location: ./panier.php"); 
		exit;
	}
?>		