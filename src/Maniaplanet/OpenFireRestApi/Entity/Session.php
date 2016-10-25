<?php
    
namespace Maniaplanet\OpenFireRestApi\Entity;

class Session extends OpenFireEntity
{
    static $name = 'session';
    
    static $properties = array(
        'sessionId'           => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'username'            => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'ressource'           => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => false  , self::ISARRAY => false  )   ,
        'node'                => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'sessionStatus'       => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'presenceStatus'      => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'priority'            => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'hostAddress'         => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'hostName'            => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'creationDate'        => array( self::TYPE => self::TYPEDATE    , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'lastActionDate'      => array( self::TYPE => self::TYPEDATE    , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'secure'              => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
    );
}