<?php
    
namespace Maniaplanet\OpenFireRestApi\Entity;

class User extends OpenFireEntity
{
    static $name = 'user';
    
    static $properties = array(
        'username'            => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'name'                => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'email'               => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
        'password'            => array( self::TYPE => self::TYPESTRING  , self::ISREQUIRED => true   , self::ISARRAY => false  )   ,
    );
}