
<?php
session_start();
if(isset($_SESSION["user"])){
    $buttons = file_get_contents("includes/header_logged.html");
}
else{
    $buttons = file_get_contents("includes/header_not_logged.html")
}

echo ('
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="img/AlgoBreizh_Logo_48px.png" alt="AlgoBreizh" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">'
      . $buttons .
      '</ul>
    </div>
  </div>
</nav>');

?>