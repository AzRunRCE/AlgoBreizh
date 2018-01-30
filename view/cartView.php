<?php $this->title = "Panier"; ?>

  <div class="row">
	<table id="cartTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th></th>    
				<th>Article</th>    
				<th>Prix (unitaire)</th>
				<th>Quantité</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $totalPrice = 0; ?>
			<?php foreach ($cart as $product): ?>
			<tr>
				<td class="center"><img id="article_img_<?= $product[0]->Id ?>" height="36" width="36" src="thumbnail/<?= $product[0]->Reference; ?>.jpg"></td>
				<td><?= $product[0]->Name; ?></td>
				<td><?= $product[0]->Price; ?> €</td>
				<td>&times;<?= $product[1] ?></td>
				<td class="center" style="width: 30%;">
					<a href="index.php?action=removeFromCart&productId=<?= $product[0]->Id; ?>" class="btn btn-sm btn-danger">Supprimer</a>
				</td>
			</tr>
			<?php $totalPrice += $product[0]->Price*$product[1]; ?>
			<?php endforeach; ?>
		</tbody>
		<tr id="actionsBtn" class="center hidden">
			<td colspan="5" id="table-footer">
				<br />
				<p style="font-size: 16px;">Prix total à payer: <b style="color: red;"><?= $totalPrice ?> €</b></p>
				<br />
				<a href="index.php?action=checkOut" class="btn btn-sm btn-success">Passer commande</a> &nbsp; 
				<a href="index.php?action=clearCart" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Vider le panier</a>
			</td>
		</tr>
	</table>
  </div>

<script>
  $(document).ready(function() {
    //Paramètres du DataTable
	$("#cartTable").DataTable({
		"stateSave": true,
		"ordering": false,
		"deferRender": false,
		"bFilter": false,
  		"bLengthChange": false,
		"responsive": true,
		"language": { 
			"url": 'style/french.cart.json'
		},
	  	"aoColumns": [
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": true}
	  	],
		"processing": true,
	  	"serverSide": false,
	});
	setTimeout(function(){
	if ($(".dataTables_empty")[0]) {
	  //$(".dataTables_info").addClass("hidden");
	  //$(".pagination").addClass("hidden");
	} else {
	  $("#actionsBtn").removeClass("hidden");
	}}, 700);
  });
</script>