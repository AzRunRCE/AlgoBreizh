<?php
require_once("model.php");

class Order extends Model {
	public $Id;
	public $CreationDate;
	public $Status;
	public $OwnerId;
	public $Content;
    public function __construct($_id, $_creationDate, $_status, $_OwnerId,$_Content) {
		$this->Id = $_id;
		$this->CreationDate = $_creationDate;
		$this->Status = $_status;
		$this->OwnerId = $_OwnerId;
		$this->Content = $_Content;
	}
}
?>