<?php $this->title = "Commandes"; ?>

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
				<?php
					if ($order->Status == 1) {
						echo '<td class="center" color="blue">Traîtée</td>';
					}
					else if ($order->Status == 2) {
						echo '<td class="center" color="red">Annulée</td>';
					}
					else {
						echo '<td class="center"><a class="btn btn-sm btn-success" href="http://localhost/AlgoBreizh/index.php?action=switchState&orderId='.$order->Id.'">Valider</a></td>';
					}		
				?>
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
		"ordering": false,
		"deferRender": false,
		"bFilter": false,
  		"bLengthChange": false,
		"responsive": true,
		"language": { 
			"url": 'style/french.orderAdm.json'
		},
	  	"aoColumns": [
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": false},
		   {"bSortable": false}
	  	],
		"processing": false,
	  	"serverSide": false,
	});
  });
</script>