<?php
    
namespace Gidkom\OpenFireRestApi\Entity;

class ChatRoomParticipant extends OpenFireEntity
{
    static $properties = array(
        'jid'                    => array( self::TYPE => self::TYPESTRING   , self::ISARRAY => false , self::ISREQUIRED => true   )   ,
        'role'                   => array( self::TYPE => self::TYPESTRING   , self::ISARRAY => false , self::ISREQUIRED => true   )   ,
        'affiliation'            => array( self::TYPE => self::TYPESTRING   , self::ISARRAY => false , self::ISREQUIRED => true   )   ,
    );
}