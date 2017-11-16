<?php $this->title = "Produits" ?>

<?php foreach ($products as $product):?>
   <div class="col-md-2">
            <div class="card" style="height: 230px">
                <div class="card-image">
                    <center> <img class="imageClip" src="thumbnail/<?php echo $product['label']; ?>.jpg"> </center>           
                </div>       
                <div class="card-content" style="height: 60px">
                    <p style="font-size: 16px"><?php echo $product['description']; ?></p>
                </div>   
                <div class="card-action">
                <p>Prix: <?php echo $product['price']; ?></p>
                    <a href="#" id="<?php echo $product['id']; ?>" class="btn btn-sm btn-success">Ajouter au panier</a>
                </div>
            </div>
        </div>
<?php endforeach; ?>