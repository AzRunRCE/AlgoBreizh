<?php $this->title = "Produits" ?>


<div class="col-md-2">
            <div class="card" style="height: 230px">
                <div class="card-image">
                    <center> <img class="imageClip" src="thumbnail/<?=$product['label']?>.jpg"> </center>           
                </div>       
                <div class="card-content" style="height: 60px">
                    <p style="font-size: 16px"><?=$product['description']?></p>
                </div>   
                <div class="card-action">
                <p>Prix: <?php echo $product['price']; ?></p>
                    <a href="#" id="<?= $product['id']?>" class="btn btn-sm btn-success">Ajouter au panier</a>
                </div>
            </div>
</div>