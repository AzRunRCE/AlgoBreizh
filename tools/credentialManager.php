<?php
	 function UserIsLogged(){
		if(!isset($_SESSION["customer"])){
			return false;
		}
		else{
			return true;
		}
	}
	function UserIsAdmin(){
		if(isset($_SESSION["customer"])){
			if($_SESSION["customer"]->UserRights() == 1){		
				return true;
			}
		}
		return false;
	}

?>