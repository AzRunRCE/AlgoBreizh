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
				<div class="articleBtn">
					<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" onclick="showProduct(<?= $product->Id ?>)" style="width: 100%;"><span class="glyphicon glyphicon-search"></span> Voir l'article</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

  <!-- Modal Article -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modal_article_title" class="modal-title"><span class="glyphicon glyphicon-info-sign"></span> Sélection de l'article</h4>
        </div>
        <div class="modal-body">
          <div class="card" style="height: 230px;">
			<div class="center">
			  <img id="modal_article_img" class="imageClip center" src="img/warning_sign.png" />
			  <input type="hidden" id="modal_article_id" />
              <div class="card-content" style="height: 60px;">
				<p id="modal_article_name" style="font-size: 16px;"></p>
			  </div>
			</div>
			<div class="card-action center">
			  <p>Prix: <span id="modal_article_price"></span> €</p>
			  <p>Quantité: <input class="control" type="number" min="1" max="10" value="1" id="modal_quantity" name="modal_quantity" style="width: 25%;" onchange="newPrice(document.getElementById('modal_article_id').innerText)"></p>
			</div>
          </div>
        </div>
        <div class="modal-footer center">
          <button class="btn btn-sm btn-success" data-dismiss="modal" onclick="addToCart($('#modal_article_id').text());">Ajouter au panier</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Success -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modal_message_title" class="modal-title"><span class="glyphicon glyphicon-ok-circle"></span> Article ajouté</h4>
        </div>
        <div class="modal-body">
          <div>
			<div class="center">
			  <p id="modal_message_success"></p>
			</div>
          </div>
        </div>
        <div class="modal-footer center">
          <button class="btn btn-sm btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-shopping-cart"></span> Continuer mes achats</button> &nbsp; 
		  <a href="index.php?action=cart" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-lock"></span> Consulter mon panier</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Erreur -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modal_message_title" class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Erreur</h4>
        </div>
        <div class="modal-body">
          <div>
			<div class="center">
			  <p id="modal_message_error"><span><img src="img/Danger_Icon.png" style="width: 7%; height: 7%;" />&nbsp; Une erreur est survenue. Veuillez réesayer ultérieurement.</span></p>
			</div>
          </div>
		</div>
        <div class="modal-footer center">
		  <br />
		</div>
      </div>
    </div>
  </div>

<script type="text/javascript">
                <!--
						function capitalizeFirstLetter(string) {
							return string.charAt(0).toUpperCase() + string.slice(1);
						}
						// Affiche les articles dans des modals
                        function showProduct(id)
                        {
							$("#modal_article_id").text(id);
							$("#modal_article_name").text(capitalizeFirstLetter($("#article_name_" + id).text()));
							$("#modal_article_img")[0].src = $("#article_img_" + id)[0].src; 
							$("#modal_article_price").text($("#article_price_" + id).text());
							$("#modal_quantity").val("1");
						}
						// Actualise le prix de l'article en fonction de la quantité
						function newPrice(id) {
							var Price = $("#article_price_" + id).text();
							var newPrice = Price * $("#modal_quantity").val();
							$("#modal_article_price").text(Math.round(newPrice*100)/100);
						}
						// Ajoute l'article au panier
						function addToCart(id) {
							var Quantity = $("#modal_quantity").val();
							var Name = $("#modal_article_name").text();
							$.ajax({
								url: 'index.php?action=addToCart&productId='+id+'&quantity='+Quantity,
								type: 'GET',
								dataType: 'json',
								success: function(json) {
									if (json['code'] == 'success') {	// Ouverture de la modal de succès si l'article a été ajouté
										$("#modal_message_success").html("<span><img src=\"img/success_sign.png\" style=\"width: 10%; height: 10%;\" />&nbsp; L'article <b>" + Name + " x" + Quantity + "</b> a été ajouté au panier.</span>");
										$("#myModal2").modal("show");
									} else {							// Ouverture de la modal d'erreur si une erreur est survenue lors de l'ajout
										$("#modal_message_error").html("<span><img src=\"img/error_sign.png\" style=\"width: 10%; height: 10%;\" />&nbsp; Une erreur est survenue. Veuillez réesayer ultérieurement.</span>");
										$("#myModal3").modal("show");
									}
								}
							});
						}
                -->
</script>