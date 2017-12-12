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
				<td><?php echo $order['date']; ?></td>
				<td><a href="https://www.w3schools.com">PDF</a></td>
				<td><?= ($order['status'] ? 'Traîtée' : 'En attente') ?></td>
			<?php endforeach; ?>
			</tr>
        </tbody>
    </table>
	</div>
 <script>
  $(document).ready(function() {
    $('#orderTable').DataTable();
  });
</script>