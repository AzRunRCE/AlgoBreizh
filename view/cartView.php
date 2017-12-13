<?php $this->title = "Panier"; ?>

  <div class="row">
	<table id="cartTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th></th>    
                <th>Article</th>    
                <th>Prix</th>
				<th>Quantité</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
			<?php $position = 0; ?>
			<?php foreach ($products as $product):?>
			<tr>
				<td class="center"><img id="article_img_<?= $product->Id ?>" height="36" width="36" src="thumbnail/<?= $product ->Reference ?>.jpg"></td>
				<td><?= $product->Name; ?></td>
				<td><?= $product->Price; ?> €</td>
				<td>&times;1</td>
				<td>
					<a href="index.php?action=buyFromCart&productId=<?= $position; ?>" class="btn btn-sm btn-success">ACHETER CET ARTICLE</a> &nbsp; 
					<a href="index.php?action=removeFromCart&productId=<?= $position; ?>" class="btn btn-sm btn-danger">SUPPRIMER</a>
				</td>
			</tr>
			<?php $position = $position + 1;?>
			<?php endforeach; ?>
        </tbody>
		<tr class="center">
			<td colspan="5">
				<br />
				<a href="index.php?action=buyAllFromCart&productId=<?= $position; ?>" class="btn btn-sm btn-success">PASSER COMMANDE</a> &nbsp; 
				<a href="index.php?action=removeAllFromCart&productId=<?= $position; ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> VIDER LE PANIER</a>
			</td>
		</tr>
    </table>
  </div>

<script>
  $(document).ready(function() {
    //Paramètres du DataTable
	$('#cartTable').DataTable({
		"stateSave": true,
		"deferRender": false,
		"bFilter": false,
  		"bLengthChange": false,
		"responsive": true,
		"language": { 
			"url": 'assets/plugins/DataTables/json/french.json'
		},
	  	"aoColumns": [
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": false},
		   {"bSortable": false},
		   {"bSortable": false}
	  	],
		"processing": false,
	  	"serverSide": false,
	});
	if ($('.dataTables_empty').html('No data available in table')) {
	  $('.dataTables_empty').html('<p class="center">Vous ne disposez d\'aucun produit. Pour ajouter un produit à votre panier, consultez la <a href="index.php?action=products"><span class="glyphicon glyphicon-shopping-cart"></span> Boutique</a></p>');
	}
  });
</script>