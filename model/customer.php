<?php
class Customer{
	public $Id;
	public $FirstName;
	public $LastName;
	public $Username;
	public $Password;
	public $Email;
	public $Enabled;
	public $AdminRight;
    public function __construct($_id, $_FirstName, $_LastName, $_Username, $_Password, $_Email, $_Enabled, $_AdminRight) {
		$this->Id = $_id;
		$this->FirstName = $_FirstName;
		$this->LastName = $_LastName;
		$this->Username = $_Username;
		$this->Password = $_Password;
		$this->Email = $_Email;
		$this->Enabled = $_Enabled;
		$this->AdminRight = $_AdminRight;
    }
}
?>