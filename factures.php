<?php
session_start();
include('includes/functions.php');
//Déconnexion
if(isset($_GET["action"]) && $_GET['action'] == "logout"){
    if(session_destroy() == true){
        header('Location: login.php');
    }else{
        throw new Exception('BreizhError: User not logged');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AlgoBreizh - Factures</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    h1, h2, h3, h4, h5, h6 {
		font-family: 'Trebuchet MS';
		color: #005500;
	}
	p, div {
    font-family: 'Trebuchet MS';
	}
  </style>
</head>
<body>
<?php
if(verifyUserIsLogged())
    showHeader();
?>
<h1>AlgoBreizh - Factures</h1>
<div class="container">
  <div class="row">
	<h3>Projets AlgoBreizh</h3>
	<p><a color="00AA00" href="~an.my">My AN NGOC</a>
	<p><a href="~d.samson">Denis SAMSON</a>
	<p><a href="~j.cadieu">Jonas CADIEU</a>
	<p><a href="~s.gamarde">Sebastien GAMARDE</a>
	<p><a href="~s.plaisier">Sylvain PLAISIER</a>
	<p><a href="~y.bouchard">Yoann BOUCHARD</a>
	<h4><A HREF="Certificats.zip">Certificats</A></h4>
	<p/>
	</div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
<table>
		<tr>
			<td><img src="img/AlgoBreizh_Logo_128px.png" alt="AlgoBreizh" /></td>
			<td>
				<b>AlgoBreizh</b> - SARL au capital de 100 000 euros<br/>
				18, rue de Molene, 29810 LAMPAUL-PLOUARZEL<br/>
				02.98.97.96.95    www.algobreizh.com    info@algobreizh.com
			</td>
		</tr>
	</table>
</div>
</body>

</html>
