<!DOCTYPE html>
<html lang="en">
<head>
  <title>AlgoBreizh - <?= $title ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
  <link rel="stylesheet" href="style/bootstrap.css" />
  <link rel="stylesheet" href="style/style.css" />
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <div class="card" style="height: 230px">
                <div class="card-image">
                    <center> <img class="imageClip" src="thumbnail/<?= $product->Label ?>.jpg"> </center>           
                </div>       
                <div class="card-content" style="height: 60px">
                    <p style="font-size: 16px"><?= $product->Desc ?></p>
                </div>   
                <div class="card-action">
                <p>Prix: <?= $product->Price ?></p>
                    <a href="#" id="<?= $product->Id ?>" class="btn btn-sm btn-success">Ajouter au panier</a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>