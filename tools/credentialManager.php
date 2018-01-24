<?php
	 function UserIsLogged(){
		if(!isset($_SESSION["client"])){
			return false;
		}
		else{
			return true;
		}
	}
	function UserIsAdmin(){
		if(isset($_SESSION["client"])){
			if($_SESSION["client"]["admin"] == 1){		
				return true;
			}
		}
		return false;
	}
	function checkLogin(){
	}
	function register(){
	}
?>