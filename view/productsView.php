<?php $this->title = "Produits" ?>

<?php foreach ($products as $product):?>
   <div class="col-md-2">
            <div class="card" style="height: 230px">
                <div class="card-image">
                    <center> <img id="article_img_<?=$product->Id ?>" class="imageClip" src="thumbnail/<?=$product->Label ?>.jpg"> </center>           
                </div>       
                <div class="card-content" style="height: 60px">
                    <p id="article_desc_<?=$product->Id ?>" style="font-size: 16px"> <?= $product->Desc ?></p>
                </div>   
                <center>
				<div class="card-action">
					<p id="article_price_<?=$product->Id ?>">Prix: <?= $product->Price ?> €</p>
						
						<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" onclick="showProduct(<?=$product->Id ?>)">Voir l'article</a>
					</div>
				</center>
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
          <div class="card" style="height: 230px">
				<center><img id="modal_article_img" class="imageClip" src="thumbnail/conserves.jpg"></center>   
				<input type="hidden" id="modal_article_id">
                <div class="card-content" style="height: 60px">
                    <p id="modal_article_desc" style="font-size: 16px"></p>
                </div>   
                <center>
				<div class="card-action">
					<p id="modal_article_price"></p>
					<label>Quantity: </label>
					<input class="control" type="number" min="1" max="10" value="1" id="modal_quantity" name="modal_quantity">
				</div>
				</center>
            </div>
        </div>
        <div class="modal-footer">
        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" >Ajouter au panier</a>
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
						function AddToCart(productId,Quantity) {
						
						}
                -->
</script>