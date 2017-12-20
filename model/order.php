<?php
class Order{
	public $Id;
	public $CreationDate;
	public $Status;
	public $OwnerId;
    public function __construct($_id, $_creationDate, $_status, $_OwnerId) {
		$this->Id = $_id;
		$this->CreationDate = $_creationDate;
		$this->Status = $_status;
		$this->OwnerId = $_OwnerId;
    }
}
?>