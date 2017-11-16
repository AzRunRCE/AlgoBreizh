<?php
abstract class BaseControler {
  
	 function UserIsLogged(){
		if(!isset($_SESSION["client"])){
			return false;
		} 
		else{
			return true;
		}
	}
}
?>