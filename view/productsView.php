<?php $this->title = "Produits" ?>

<?php foreach ($products as $product):?>
	<div class="col-md-2">
		<div class="card" style="height: 230px;">
			<div class="card-image center">
				<img id="article_img_<?= $product->Id ?>" class="imageClip" src="thumbnail/<?= $product->Label ?>.jpg">
			</div>       
			<div class="card-content" style="height: 60px;">
				<p id="article_desc_<?= $product->Id ?>" style="font-size: 16px"> <?= $product->Name ?></p>
			</div>   
			<div class="card-action center">
				<p id="article_price_<?= $product->Id ?>">Prix: <?= $product->Price ?> €</p>		
				<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" onclick="showProduct(<?=$product->Id ?>)" style="width: 100%;">Voir l'article</a>
			</div>
		</div>
	</div>
<?php endforeach; ?>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modal_article_title" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="card" style="height: 230px;">
			<div class="center">
			  <img id="modal_article_img" class="imageClip center" src="thumbnail/conserves.jpg">
			  <input type="hidden" id="modal_article_id">
              <div class="card-content" style="height: 60px;">
				<p id="modal_article_desc" style="font-size: 16px;"></p>
			  </div>
			</div>
			<div class="card-action center">
			  <p id="modal_article_price"></p>
			  <label>Quantity: </label>
			  <input class="control" type="number" min="1" max="10" value="1" id="modal_quantity" name="modal_quantity">
			</div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-sm btn-success" data-toggle="modal" onclick="addToCart(productId,Quantity)">Ajouter au panier</a>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
                <!--
                        function showProduct(id)
                        {
							document.getElementById("modal_article_id").innerText = id;
							document.getElementById("modal_article_title").innerText = capitalizeFirstLetter(document.getElementById("article_desc_" + id).innerText);
							document.getElementById("modal_article_desc").innerText = capitalizeFirstLetter(document.getElementById("article_desc_" + id).innerText);
							document.getElementById("modal_article_img").src = document.getElementById("article_img_" + id).src; 
							document.getElementById("modal_article_price").innerText = document.getElementById("article_price_" + id).innerText ;
						}
						function capitalizeFirstLetter(string) {
							return string.charAt(0).toUpperCase() + string.slice(1);
						}
						function addToCart(productId,Quantity) {
							$.ajax({
								url: 'index.php?action=addToCart&productId='+productId+'&Quantity='+Quantity,
								type: 'GET',
								dataType: 'json',
								success: function(json) {
									if (json['code'] == 'success') {
										alert('Opération réussie !');	// Placeholder 'succès'
									} else {
										alert('Une erreur s\'est produite.');	// Placeholder 'erreur'
									}
								}
							});
						}
                -->
</script>