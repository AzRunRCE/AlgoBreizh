<?php $this->title = "Erreur"; ?>

  <div class="center">
	<br />
	<h1><img src="img/error_sign.png" style="width: 50px; height: 50px;" />&nbsp; Algo<b>Breizh</b> - Erreur !</h1>
	<br />
	<br />
	<p><?= $msgErreur ?></p>
	<br />
	<br />
	<button class="btn btn-sm btn-success" onclick="location.reload()"><span class="glyphicon glyphicon-repeat"></span> Réessayer</button> &nbsp; 
	<button class="btn btn-sm btn-secondary" onclick="window.history.back()"><span class="glyphicon glyphicon-chevron-left"></span> Retour</button>
  </div>
  
<script>
  $(document).ready(function() {
	$('.pageTitle').addClass('hidden');
  });
</script>