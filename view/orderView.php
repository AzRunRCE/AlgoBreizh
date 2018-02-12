<?php $this->title = "Commande N°".str_pad($Order->id(), 8, '0', STR_PAD_LEFT); ?>

  <div class="row">
	<table id="cartTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th></th>    
				<th>Article</th>    
				<th>Prix (unitaire)</th>
				<th>Quantité</th>
			</tr>
		</thead>
		<tbody>
			
			<?php $totalPrice = 0; ?>
			<?php foreach ($Order->content() as $product): ?>
			<tr>
				<td class="center"><img id="article_img_<?= $product->reference(); ?>" height="36" width="36" src="thumbnail/<?= $product['reference']; ?>.jpg"></td>
				<td><?= $product->name(); ?></td>
				<td><?= $product->price(); ?> €</td>
		//		<td><?= $product[0]['quantity'];?></td>
				
			</tr>
			<?php $totalPrice += $product[0]->price()*$product[1]; ?>
			<?php endforeach; ?>
		</tbody>
		<tr id="actionsBtn" class="center hidden">
			<td colspan="5" id="table-footer">
				<br />
				<p style="font-size: 16px;">Prix total: <b style="color: red;"><?= $totalPrice ?> €</b></p>
				<br />
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