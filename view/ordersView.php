<?php $this->title = "Mes commandes"; ?>

  <div class="row">
	<table id="orderTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Date</th>    
				<th>N° Commande</th>
				<th>Facture</th>
				<th>Statut</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($orders as $order): ?>
			<tr>
				<td><?= $order->CreationDate ?></td>
				<td>
				<?php
					$idFormated = str_pad($order->Id, 8, '0', STR_PAD_LEFT);
					echo '<a href="http://localhost/AlgoBreizh/index.php?action=order&order='.$order->Id.'".</a>'.$idFormated.'</td>';
					if ($order->Status == 1) {
						echo '<td><a href="http://localhost/AlgoBreizh/index.php?action=generatePdf&orderId='.$order->Id.'">PDF</a></td>';
						echo '<td><span style="color: green;">Traîtée</span></td>';
					}
					else if ($order->Status == 2) {
						echo '<td>Non disponible</td>';
						echo '<td><span style="color: red;">Annulée</span></td>';
					}
					else {
						echo '<td>Non disponible</td>';
						echo '<td><span style="color: orange;">En attente</span></td>';
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
			"url": 'style/french.order.json'
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