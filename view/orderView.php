<?php $this->title = "Mes commandes"; ?>

  <div class="row">
	<table id="orderTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Date</th>    
                <th>Justificatif</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
			<tr>
			<?php foreach ($orders as $order):?>
				<td><?= $order['date']; ?></td>
				<td><a href="https://www.w3schools.com">PDF</a></td>
				<td><?= ($order['status'] ? 'Traîtée' : 'En attente') ?></td>
			<?php endforeach; ?>
			</tr>
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
			"url": 'style/French.json'
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
	setTimeout(function(){
	if ($(".dataTables_empty").html("No data available in table")) {
	  $(".dataTables_empty").html("<p class=\"center\">Vous n'avez passé aucune commande</p>");
	}}, 500);
  });
</script>