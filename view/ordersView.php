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
				<td><?= $order->creationDate() ?></td>
				<td>
				<?php
					$idFormated = str_pad($order->Id(), 8, '0', STR_PAD_LEFT);
					echo '<a href="http://localhost/AlgoBreizh/index.php?action=order&order='.$order->Id().'".</a>'.$idFormated.'</td>';
					if ($order->state() == 1) {
						echo '<td><a href="http://localhost/AlgoBreizh/index.php?action=generatePdf&orderId='.$order->id().'">PDF</a></td>';
						echo '<td><span style="color: green;">Traîtée</span></td>';
					}
					else if ($order->state() == 2) {
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
		"page": true,
		"pagingType": "scrolling",
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
  });