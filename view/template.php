<!DOCTYPE html>
<html lang="fr">
<head>
  <title>AlgoBreizh - <?= $title ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="style/style.css" type="text/css" />
  <link rel="stylesheet" href="style/jquery.dataTables.css" type="text/css" />
  <link rel="stylesheet" href="style/style.css" type="text/css" />
  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap.js"></script>
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="img/AlgoBreizh_Logo_48px.png" alt="AlgoBreizh" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="index.php?action=products" style="color: white;"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>
		<?php if ($logged){echo '<li><a href="index.php?action=cart" style="color: white;"><span class="glyphicon glyphicon-lock"></span> Panier</a></li>';}?>
		<li><a href="index.php?action=<?= ($logged ? 'order' : 'register') ?>" style="color: white;"><span class="<?= ($logged ? 'glyphicon glyphicon-euro' : 'glyphicon glyphicon-pencil') ?>"></span> <?= ($logged ? 'Mes commandes' : 'Inscription') ?></a></li>
		<li><a href="index.php?action=<?= ($logged ? 'logout' : 'login') ?>" class="login" <?= ($logged ? 'data-toggle="tooltip" data-placement="bottom" title="Session: UTILISATEUR"' : '') ?> style="color: <?= ($logged ? 'orangered' : 'lawngreen') ?>;"><span class="<?= ($logged ? 'glyphicon glyphicon-log-out' : 'glyphicon glyphicon-log-in') ?>"></span> <?= ($logged ? 'Déconnexion' : 'Connexion') ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<br />
<br />
<h1 class="pageTitle"><?= $title ?></h1>
<div class="container">
  <div class="row" id="content">
	  <?= $content ?>
  </div>
</div>
<div style="height: 120px;"></div>

<script>
  // Affichage du nom de l'utilisateur de la session
  $(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
  });
  setTimeout(function(){$.ajax({
	url: 'index.php?action=isUserLogged',
	type: 'GET',
	dataType: 'json',
	success: function(json) {
		if (json['code'] == 'logged') {
			var loginTitle = "Session: ";
			if (json['firstname'].toUpperCase() == json['lastname'].toUpperCase()) {
				$(".login").attr("data-original-title", loginTitle +" "+ json['firstname'].toUpperCase());
			} else if (json['firstname'] && json['lastname']) {
				$(".login").attr("data-original-title", loginTitle +" "+ json['firstname'].toUpperCase() +" "+ json['lastname'].toUpperCase());
			} else {
				$(".login").attr("data-original-title", loginTitle + "UTILISATEUR");
			}
		}
	}
})}, 100);
</script>
</body>

<div class="navbar navbar-default navbar-fixed-bottom" id="footer">
	<table>
		<tr>
			<td><img src="img/AlgoBreizh_Logo_128px.png" alt="AlgoBreizh" /></td>
			<td>
				<b>AlgoBreizh</b> - SARL au capital de 100 000 euros<br/>
				18, rue de Molene, 29810 LAMPAUL-PLOUARZEL<br/>
				Tel. 02.98.97.96.95 - Mail. www.algobreizh.com / info@algobreizh.com
			</td>
		</tr>
	</table>
</div>
</html>