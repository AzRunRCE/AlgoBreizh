<?php $this->title = "Panier"; ?>

  <div class="row">
	<table id="cartTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th></th>    
                <th>Nom</th>    
                <th>Prix</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
			<?php $position = 0;?>
			<?php foreach ($products as $product):?>
			<tr>
				<td><img id="article_img_<?=$product->Id ?>" height="36" width="36" src="thumbnail/<?=$product->Label ?>.jpg"></td>
				<td><?php echo $product->Label; ?></td>
				<td><?=$product->Price;  ?> €</td>
				<td><a href="index.php?action=removeFromCart&productId=<?=$position;?>" class="btn btn-sm btn-danger">Supprimer</a></td>
			</tr>
			<?php $position = $position + 1;?>
			<?php endforeach; ?>
			
        </tbody>
    </table>
	</div>
 <script>
  $(document).ready(function() {
    $('#cartTable').DataTable();
} );
</script>