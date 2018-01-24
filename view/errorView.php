<?php $this->title = "<span><img src=\"img/error_sign.png\" style=\"width: 50px; height: 50px;\" />&nbsp; Algo<b>Breizh</b> - Erreur !</span>"; ?>

<p><?= $msgErreur ?></p>
<br />
<div class="center">
	<button class="btn btn-sm btn-success" onclick="location.reload()"><span class="glyphicon glyphicon-repeat"></span> Réessayer</button> &nbsp; 
	<button class="btn btn-sm btn-secondary" onclick="window.history.back()"><span class="glyphicon glyphicon-chevron-left"></span> Retour</button>
</div>