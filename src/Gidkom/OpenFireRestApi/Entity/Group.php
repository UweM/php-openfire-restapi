<?php
    
namespace Gidkom\OpenFireRestApi\Entity;

class Group extends OpenFireEntity
{
    static $name = 'group';
    
    static $properties = array(
        'name'                          => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'description'                   => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'admins'                        => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => false  , self::ISARRAY => true  , self::ARRAYELEMNAME => 'admin'   )   ,
        'members'                       => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => false  , self::ISARRAY => true  , self::ARRAYELEMNAME => 'member'  )   ,
    );
}