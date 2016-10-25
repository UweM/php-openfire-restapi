<?php
    
namespace Maniaplanet\OpenFireRestApi\Entity;

use Maniaplanet\OpenFireRestApi\Entity\RosterItem;

class Roster extends OpenFireEntity
{
    static $name = 'roster';
    
    static $properties = array(
        'jid'                    => array( self::TYPE => self::TYPESTRING   , self::ISARRAY => false , self::ISREQUIRED => true   )   ,
        'role'                   => array( self::TYPE => self::TYPESTRING   , self::ISARRAY => false , self::ISREQUIRED => true   )   ,
        'affiliation'            => array( self::TYPE => self::TYPESTRING   , self::ISARRAY => false , self::ISREQUIRED => true   )   ,
    );
}