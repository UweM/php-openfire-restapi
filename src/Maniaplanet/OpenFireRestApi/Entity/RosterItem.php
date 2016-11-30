<?php
    
namespace Maniaplanet\OpenFireRestApi\Entity;

class RosterItem extends OpenFireEntity
{
    static $name = 'rosterItem';
    
    static $properties = array(
        'jid'                 => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'nickname'            => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => false  , self::ISARRAY => false  )   ,
        'subscriptionType'    => array( self::TYPE => self::TYPEINTEGER , self::ISREQUIRED => false  , self::ISARRAY => false  )   ,
        'groups'              => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => true  , self::ARRAYELEMNAME => 'group'  )   ,
    );
}