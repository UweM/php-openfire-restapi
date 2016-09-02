<?php
	
namespace Gidkom\OpenFireRestApi\Entity;

class Group
{
	public $name          = '';
	public $description   = '';
	public $admins        = array();
	public $members       = array();
	
	public function jsonSerialize () {
        return array(
			'name'          => $this->name,
			'description'   => $this->description,
		);
	}
	
	public function jsonDeserialize ( $array ) {
		$this->name           = $array['name'];
		$this->description    = $array['description'];
		
		$this->admins = array();
		$admins = $array['admins'];
		if( $admins ) {
			$admin = $admins['admin'];
			if ( is_array($admin) ) {
				$this->admins = $admin;
			} else if ( is_string($admin) ) {
				$this->admins = array($admin);
			}
		}
		
		$this->members = array();
		$members = $array['members'];
		if( $members ) {
			$member = $members['member'];
			if ( is_array($member) ) {
				$this->members = $member;
			} else if ( is_string($member) ) {
				$this->members = array($member);
			}
		}
	}
}