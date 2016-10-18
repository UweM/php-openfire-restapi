<?php
	
namespace Gidkom\OpenFireRestApi\Entity;

class ChatRoom implements \JsonSerializable
{
	public $roomName                        = ''; 
	public $naturalName                     = ''; 
	public $description                     = ''; 
	public $password                        = ''; 
	public $subject                         = ''; 
	public $creationDate                    = '';
	public $modificationDate                = ''; 
	public $maxUsers                        = ''; 
	public $persistent                      = ''; 
	public $publicRoom                      = ''; 
	public $registrationEnabled             = ''; 
	public $canAnyoneDiscoverJID            = '';
	public $canOccupantsChangeSubject       = ''; 
	public $canOccupantsInvite              = ''; 
	public $canChangeNickname               = ''; 
	public $logEnabled                      = '';
	public $loginRestrictedToNickname       = ''; 
	public $membersOnly                     = ''; 
	public $moderated                       = ''; 
	public $broadcastPresenceRoles          = ''; 
	public $owners                          = array(); 
	public $admins                          = array();
	public $members                         = array(); 
	public $outcasts                        = array();
	
	public function jsonSerialize () {
        return get_object_vars($this);
	}
	
	public function jsonDeserialize ( $array ) {
		$this->roomName                   = $array['roomName'];
		$this->naturalName                 = $array['naturalName'];
		$this->description                 = $array['description'];
		$this->password                    = $array['password'];
		$this->subject                     = $array['subject'];
		$this->creationDate                = $array['creationDate'];
		$this->modificationDate            = $array['modificationDate'];
		$this->maxUsers                    = $array['maxUsers'];
		$this->persistent                  = $array['persistent'];
		$this->publicRoom                  = $array['publicRoom'];
		$this->registrationEnabled         = $array['registrationEnabled'];
		$this->canAnyoneDiscoverJID        = $array['canAnyoneDiscoverJID'];
		$this->canOccupantsChangeSubject   = $array['canOccupantsChangeSubject'];
		$this->canOccupantsInvite          = $array['canOccupantsInvite'];
		$this->canChangeNickname           = $array['canChangeNickname'];
		$this->logEnabled                  = $array['logEnabled'];
		$this->loginRestrictedToNickname   = $array['loginRestrictedToNickname'];
		$this->membersOnly                 = $array['membersOnly'];
		$this->moderated                   = $array['moderated'];
		$this->broadcastPresenceRoles      = $array['broadcastPresenceRoles'];
		$this->owners                      = $array['owners'];
		$this->admins                      = $array['admins'];
		$this->members                     = $array['members'];
		$this->outcasts                    = $array['outcasts'];
	}
}