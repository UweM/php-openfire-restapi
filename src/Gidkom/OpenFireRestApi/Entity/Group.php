<?php
	
namespace Gidkom\OpenFireRestApi\Entity;

class Group implements \JsonSerializable
{
	private $name          = '';
	private $description   = '';
	private $admins        = NULL;
	private $members       = NULL;
	
	public function getName         () { return $this->name        ; }
	public function getDescription  () { return $this->description ; }
	public function getAdmins       () { return $this->admins      ; }
	public function getMembers      () { return $this->members     ; }
    
	public function setName         ( $name        ) { $this->name        = $name        ; }
	public function setDescription  ( $description ) { $this->description = $description ; }
	public function setAdmins       ( $admins      ) { $this->admins      = $admins      ; }
	public function setMembers      ( $members     ) { $this->members     = $members     ; }
    
	public function jsonSerialize () {
        
        $Result = array(
			'name'          => $this->name,
			'description'   => $this->description,
        );
                
        if( $this->admins                   !== NULL ) { $Result[ 'admins'                   ] = array( 'admins'                => $this->admins                ); }
        if( $this->members                  !== NULL ) { $Result[ 'members'                  ] = array( 'members'               => $this->members               ); }
		
        return $Result;
	}
	
	public function jsonDeserialize ( $array ) {
		$this->name           = $array['name'];
		$this->description    = $array['description'];
		
		$this->admins = array();
		$admins = $array['admins'];
		if( $admins ) {
			$admin = $admins['admin'];
			     if ( is_array(  $admin ) ) { $this->admins = $admin        ; } 
            else if ( is_string( $admin ) ) { $this->admins = array($admin) ; }
		}
		
		$this->members = array();
		$members = $array['members'];
		if( $members ) {
			$member = $members['member'];
			     if ( is_array(  $member ) ) { $this->members = $member        ; } 
            else if ( is_string( $member ) ) { $this->members = array($member) ; }
		}
	}
}