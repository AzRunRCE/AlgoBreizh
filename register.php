<?php
session_start();
require_once("config/config.php");
require_once("functions.php");
if(isset($_SESSION["user"])){
  header('Location: index.php');
}
if (isset($_POST['register'])){
	if (isset($_POST['email']) && isset($_POST['clientCode'])){
		if (register($_POST['email'],$_POST['clientCode']));
		{
			
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AlgoBreizh - Inscription</title>
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
<?php showHeader(); ?>
<div class="container">
	<div class="row">
<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">S'inscrire</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="register.php" method="POST">
                            <fieldset>
								<input name="register" type="hidden" value="">               
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="true" placeholder="Code client" name="clientCode" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Inscription" class="btn btn-sm btn-success" />
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>
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
