
function envoyerRequete()
{
	$.post("./euro.php","",function(reponse){
		$("#panier").html(reponse);
	},'html');	
}
envoyerRequete();

$(function()
{
	$("#supprimer").click(()=>
	{
		$.get('./deco.php','',(reponse)=>
		{
			//console.log(reponse);
			document.location.href="acceuil.php";
		},'html');
	});
});
