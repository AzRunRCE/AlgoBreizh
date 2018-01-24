<?php $this->title = "Mes commandes"; ?>

  <div class="row">
	<table id="orderTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Date</th>    
				<th>N° Commande</th>
				<th>Justificatif</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($orders as $order): ?>
			<tr>
				<td><?= $order->CreationDate ?></td>
				<td><?= str_pad($order->Id, 8, '0', STR_PAD_LEFT) ?></td>
				<td><a href="http://localhost/AlgoBreizh/index.php?action=generatePdf&orderId=<?= $order->Id ?>">PDF</a></td>
				<td><?= ($order->Status == 1 ? 'Traîtée' : 'En attente') ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
  </div>

<script>
  $(document).ready(function() {
    //Paramètres du DataTable
	$("#orderTable").DataTable({
		"stateSave": true,
		"deferRender": false,
		"bFilter": false,
  		"bLengthChange": false,
		"responsive": true,
		"language": { 
			"url": 'style/french.order.json'
		},
	  	"aoColumns": [
		   {"bSortable": false},
		   {"bSortable": true},
		   {"bSortable": false},
		   {"bSortable": false},
		   {"bSortable": false}
	  	],
		"processing": false,
	  	"serverSide": false,
	});
  });
</script>