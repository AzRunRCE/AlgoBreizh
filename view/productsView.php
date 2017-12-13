<?php $this->title = "Produits" ?>

<?php foreach ($products as $product):?>
	<div class="col-md-2">
		<div class="card center" style="height: 230px;">
			<a href="thumbnail/<?= $product->Reference ?>.jpg" target="_blank">
			<div class="card-image" onmouseover="this.style.cursor='zoom-in'">
				<img id="article_img_<?= $product->Id ?>" class="imageClip" src="thumbnail/<?= $product->Reference ?>.jpg">
			</div>
			</a>
			<div class="card-content" style="height: 70px;">
				<p id="article_name_<?= $product->Id ?>" style="font-size: 16px"> <?= $product->Name ?></p>
			</div>   
			<div class="card-action">
				<p>Prix: <span id="article_price_<?= $product->Id ?>"><?= $product->Price ?></span> €</p>
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
          <h4 id="modal_article_title" class="modal-title">Sélection de l'article</h4>
        </div>
        <div class="modal-body">
          <div class="card" style="height: 230px;">
			<div class="center">
			  <img id="modal_article_img" class="imageClip center" src="thumbnail/conserves.jpg">
			  <input type="hidden" id="modal_article_id">
              <div class="card-content" style="height: 60px;">
				<p id="modal_article_name" style="font-size: 16px;"></p>
			  </div>
			</div>
			<div class="card-action center">
			  <p>Prix: <span id="modal_article_price"></span> €</p>
			  <p>Quantité: <input class="control" type="number" min="1" max="10" value="1" id="modal_quantity" name="modal_quantity" style="width: 25%;" onchange="newPrice(<?=$product->Id ?>)"></p>
			</div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-sm btn-success" data-dismiss="modal" onclick="addToCart(<?=$product->Id ?>)">AJOUTER AU PANIER</a>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
                <!--
						function capitalizeFirstLetter(string) {
							return string.charAt(0).toUpperCase() + string.slice(1);
						}
                        function showProduct(id)
                        {
							$("#modal_article_id")[0].innerText = id;
							$("#modal_article_name")[0].innerText = capitalizeFirstLetter($("#article_name_" + id)[0].innerText);
							$("#modal_article_img")[0].src = $("#article_img_" + id)[0].src; 
							$("#modal_article_price")[0].innerText = $("#article_price_" + id)[0].innerText;
							$("#modal_quantity")[0].value = "1";
						}
						function newPrice(id) {
							var Price = $("#article_price_" + id)[0].innerText;
							var newPrice = Price * $("#modal_quantity").val();
							$("#modal_article_price")[0].innerText = newPrice;
						}
						function addToCart(id) {
							var Quantity = $("#modal_quantity").val();
							$.ajax({
								url: 'index.php?action=addToCart&productId='+id+'&quantity='+Quantity,
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