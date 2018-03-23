<?php $this->title = "Ajouter un nouveau produit"; ?>
<div class="row">
	<div class="col-md-12">
		<div class="modal-dialog" style="margin-bottom:0">
			<div class="modal-content">
				<div class="panel-heading">
					<h3 class="panel-title">Saissisez les propriétes du produit</h3>
				</div>
				<div class="panel-body">
					<form role="form" action="index.php?action=addNewProduct" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Nom" name="name" required="" autofocus="" />
							</div>
							<div class="form-group">
							<h4>Vignette</h4>
							<label class="btn btn-default btn-file">
    						... <input type="file" name="thumbail" style="display: none;">
							</label>
							</div>
							<div class="form-group">
								<input type="number" min="0" max="999999" class="form-control" placeholder="15" name="price" required=""/>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Reference" name="reference" required="" />
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<input type="submit" value="Valider" class="btn btn-sm btn-success" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>