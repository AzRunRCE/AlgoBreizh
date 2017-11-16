<!DOCTYPE html>
<html lang="en">
<head>
  <title>AlgoBreizh - <?= $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/bootstrap.css">
  <link rel="stylesheet" href="style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  
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
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="index.php?action=products" style="color: white;"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></li>
		<li><a href="index.php?action=<?= ($logged ? 'order' : 'login') ?>" style="color: white;"><span class="glyphicon glyphicon-barcode"></span> <?= ($logged  ? 'Mes commandes' : 'Connection') ?></a></li>
		<li><a href="index.php?action=<?= ($logged ? 'logout' : 'register') ?>" style="color:  red;"><span class="glyphicon glyphicon-log-out"></span> <?= ($logged ? 'Déconnexion' : 'Inscription') ?></a></li>
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
