<?php
require_once("model.php");

class Order  {
	private $_id;
	public $_creationDate;
	public $_state;
	public $_ownerId;
	public $_content;

    public function __construct($data,$content) {
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
  		foreach ($data as $key => $value)
  		{
    		// On récupère le nom du setter correspondant à l'attribut.
    		$method = 'set'.ucfirst($key);
    		// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
			// On appelle le setter.
				$this->$method($value);
			}
  		}
	}

	public function id() { return $this->_id; }
	public function creationDate() { return $this->_creationDate; }
	public function state() { return $this->_state; }
	public function ownerId() { return $this->_ownerId; }
	public function content() { return $this->_content; }

 	public function setId($id)
  	{
		$id = (int) $id;
		// On vérifie que l'id n'est pas négatif.
		if ($id > 0)
		{
			$this->_id = (int) $id;
		}
		else {
			throw new Exception("Id property can't be 0");
		}
	}

	public function setCreationDate($date){
			$this->_creationDate = $date;
	}
	
	public function setState($state){
		$state = (int) $state;
		if ($state = 0 || $state = 1){
			$this->_state = $state;
		}
	}

	public function setContent($content){
		if (is_array($content)){
			$this->_content = $content;
		}
	}

	public function setOwnerId($id){
		$id = (int) $id;
		if ($id > 0)
		{
			$this->_ownerId = (int) $id;
		}
		else {
			throw new Exception("ownerId property can't be 0");
		}
	}

}
?>