<?php
	
namespace Gidkom\OpenFireRestApi\Entity;

class User implements JsonSerializable
{
	public $username          = '';
	public $name              = '';
	public $email             = '';
	public $password          = '';
	public $properties        = array();
	
	public function jsonSerialize () {
        return get_object_vars($this);
	}
	
	public function jsonDeserialize ( $array ) {
		$this->username        = $array['username'];
		$this->name            = $array['name'];
		$this->email           = $array['email'];
		$this->password        = $array['password'];
		$this->properties      = $array['properties'];
	}
}