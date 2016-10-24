<?php
    
namespace Gidkom\OpenFireRestApi\Entity;

class User implements \JsonSerializable
{
    private $username          = '';
    private $name              = '';
    private $email             = '';
    private $password          = '';
    private $properties        = array();
    
    public function getUsername     () { return $this->username    ; }
    public function getName         () { return $this->name        ; }
    public function getEmail        () { return $this->email       ; }
    public function getPassword     () { return $this->password    ; }
    public function getProperties   () { return $this->properties  ; }
    
    public function setUsername     ( $username    ) { $this->username   = $username    ; }
    public function setName         ( $name        ) { $this->name       = $name        ; }
    public function setEmail        ( $email       ) { $this->email      = $email       ; }
    public function setPassword     ( $password    ) { $this->password   = $password    ; }
    public function setProperties   ( $properties  ) { $this->properties = $properties  ; }
    
    public function jsonSerialize () {
        return array(
            'username'      => $this->username,
            'name'          => $this->name,
            'email'         => $this->email,
            'password'      => $this->password,
            'properties'    => $this->properties,
        );
    }
    
    public function jsonDeserialize ( $array ) {
        $this->username        = $array['username'];
        $this->name            = $array['name'];
        $this->email           = $array['email'];
        $this->password        = $array['password'];
        $this->properties      = $array['properties'];
    }
}