<?php $this->title = "Produits" ?>

<?php foreach ($products as $product):?>
   <div class="col-md-2">
            <div class="card" style="height: 230px">
                <div class="card-image">
                    <center> <img class="imageClip" src="thumbnail/<?=$product->Label ?>.jpg"> </center>           
                </div>       
                <div class="card-content" style="height: 60px">
                    <p style="font-size: 16px"> <?= $product->Desc ?></p>
                </div>   
                <center>
				<div class="card-action">
					<p>Prix: <?= $product->Price ?> €</p>
						<a href="#" id="<?=$product->Id ?>" class="btn btn-sm btn-success" onclick="showProduct(<?=$product->Id ?>)">Voir l'article</a>
					</div>
				</center>
            </div>
        </div>
<?php endforeach; ?>
<script type="text/javascript">
                <!--
                        function showProduct($id)
                        {
                              window.open('View/viewProduct.php','nom_de_ma_popup','menubar=no, scrollbars=no, top=100, left=100, width=300, height=200');
                        }
                -->
</script>