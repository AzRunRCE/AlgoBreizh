<?php $this->title = "Mes commandes"; ?>
<?php foreach ($orders as $order):?>
  <div class="row">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Date</th>    
                <th>Justificatif</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
			<tr>
				<td><?php echo $order['date']; ?></td>
				<td><a href="https://www.w3schools.com">PDF</a></td>
				<td><?= ($order['status'] ? 'Traîtée' : 'En attente') ?></td>
			</tr>
        </tbody>
    </table>
	</div>
<?php endforeach; ?>
 <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>