<?php $this->title = "Commandes clients"; ?>

  <div class="row">
	<table id="orderTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Date</th>    
				<th>N° Commande</th>
				<th>Justificatif</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($orders as $order): ?>
			<tr>
				<td><?= $order->creationDate() ?></td>
				<td><?php 		$idFormated = str_pad($order->Id(), 8, '0', STR_PAD_LEFT);
					echo '<a href="http://localhost/AlgoBreizh/index.php?action=order&order='.$order->Id().'".</a>'.$idFormated.'</td>';
					?>
				<td><a href="http://localhost/AlgoBreizh/index.php?action=generatePdf&orderId=<?= $order->id() ?>">PDF</a></td>
				<?php
					if ($order->state() == 1) {
						echo '<td class="center" style="color: green;">Traîtée</td>';
					}
					else if ($order->state() == 2) {
						echo '<td class="center" style="color: red;">Annulée</td>';
					}
					else {
						echo '<td class="center"><a class="btn btn-sm btn-success" href="http://localhost/AlgoBreizh/index.php?action=valid&orderId='.$order->id().'">Valider</a></td>';
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