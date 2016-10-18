<?php
	
namespace Gidkom\OpenFireRestApi\Entity;

class ChatRoomParticipant implements \JsonSerializable
{
	public $jid              = '';
	public $role             = '';
	public $affiliation      = '';
}