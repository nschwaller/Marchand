<!DOCTYPE html>
<html>
<head>
	<link href="acceuil.css" rel="stylesheet" />
</head>
<body>
<?php
	session_start();
?>
<div id="titre">
	<h1> Création de compte </h1> 
</div>
<div id="creation" class="form-group">
	<form name="formulaire" name="login" action="" method="POST">
		<input type="text" class="cham"  name="nom" placeholder="Nom..."/>
		<br/>
		<input type="text" class="cham" name="prenom" placeholder="Prénom..."/>
		<br/>
		<input type="text" class="cham" name="cp" placeholder="Code Postal..."/>
		<br/>
		<input type="text" class="cham" name="ville" placeholder="Ville..."/>
		<br/>
		<input type="text" class="cham" name="adresse" placeholder="Adresse..."/>
		<br/>
		<input type="text" class="cham" name="mail" placeholder="Mail..."/>
		<br/>
		<input type="text" class="cham" name="login" placeholder="Login de Connexion..."/>
		<br/>
		<input type="password" class="cham" name="mdp" placeholder="Mot de passe..."/>
		<br/>
		<input type="submit" name="ok" class="bouton" value="Valider"/>
		</br>
		</br>
		<a href="login.php" style="color:#FFFFFF" > Page de connexion </a>
	</form>		
</div>



<?php
if(isset($_POST["ok"]))
{
	$maCo=mysqli_connect("172.19.0.24","root","0550002D","marchand");
		
	$req="SELECT loginUser FROM Utilisateur WHERE loginUser='".$_POST["prenom"]."'";
	
	$resu=mysqli_query($maCo,$req);
		
	
	$chiffre=mysqli_num_rows($resu);
	
	if($chiffre==0)
	{
		if(($_POST["prenom"]=="") || ($_POST["nom"]=="") || ($_POST["cp"]=="") || ($_POST["ville"]=="") || ($_POST["adresse"]=="") || ($_POST["mail"]=="") || ($_POST["login"]=="") || ($_POST["mdp"]==""))
		{
			echo "Il manque des renseignements";
		}
		else
		{
			$mdp=password_hash($_POST["mdp"],PASSWORD_BCRYPT );	
			$maConnexion=mysqli_connect("172.19.0.24","root","0550002D","marchand");
			$requete="INSERT INTO Utilisateur (nomUser,prenomUser,adrresseUSer,cpUser,villeUser,mdpUser,loginUser,mailUser) VALUES ('".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["adresse"]."','".$_POST["cp"]."','".$_POST["ville"]."','".$mdp."','".$_POST["login"]."','".$_POST["mail"]."')";
			$resultat=mysqli_query($maConnexion,$requete);
			
			//echo $requete;
			//var_dump($resultat);
			mysqli_close($maConnexion);
			echo "Vous êtes bien enregistré, vous pouvez vous connecter";			
		}
	}
	else
	{
		echo "Nom d'utilisateur déjà pris";
	}
	
}
?>
</body>
</html>