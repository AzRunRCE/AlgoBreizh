<!DOCTYPE html>
<html lang="fr">
<head>
  <title>AlgoBreizh - <?= $title ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" href="style/bootstrap.css" />
  <link rel="stylesheet" href="style/style.css" />
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
<nav class="navbar navbar-inverse">
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
      	<li><a href="index.php?action=products" style="color: white;"><span class="glyphicon glyphicon-home"></span> Boutique</a></li>
		<?php if ($logged){echo '<li><a href="index.php?action=cart" style="color: white;"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>';}?>
		<li><a href="index.php?action=<?= ($logged ? 'order' : 'register') ?>" style="color: white;"><span class="<?= ($logged ? 'glyphicon glyphicon-barcode' : 'glyphicon glyphicon-pencil') ?>"></span> <?= ($logged ? 'Mes commandes' : 'Inscription') ?></a></li>
		<li><a href="index.php?action=<?= ($logged ? 'logout' : 'login') ?>" <?= ($logged ? 'data-toggle="tooltip" data-placement="bottom" title="Connecté en tant que: FIRSTNAME LASTNAME"' : '') ?> style="color: <?= ($logged ? 'orangered' : 'lawngreen') ?>;"><span class="<?= ($logged ? 'glyphicon glyphicon-log-out' : 'glyphicon glyphicon-log-in') ?>"></span> <?= ($logged ? 'Déconnexion' : 'Connexion') ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="pageTitle"><?= $title ?></h1>
<div class="container">
  <div class="row" id="content">
	  <?= $content ?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
  });
</script>
</body>

<div class="navbar navbar-default navbar-fixed-bottom" id="footer">
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
</html>