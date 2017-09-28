<?php
session_start();
require_once("config/config.php");
require_once("functions.php");
if(!isset($_SESSION["user"])){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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
<h1>AlgoBreizh - Mes commandes</h1>
<div class="container">
  <div class="row">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Date</th>    
                <th>Justificatif</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
           <?php echo getOrderForClient(1);?>
        </tbody>
    </table>
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
