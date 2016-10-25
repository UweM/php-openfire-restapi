<?php
    
namespace Maniaplanet\OpenFireRestApi\Entity;

class ChatRoom extends OpenFireEntity
{
    
    static $name = 'chatRoom';
    
    static $properties = array(
        'roomName'                      => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => true   , self::ISARRAY => false     )   ,
        'naturalName'                   => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => true   , self::ISARRAY => false     )   ,
        'description'                   => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => true   , self::ISARRAY => false     )   ,
        'password'                      => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'subject'                       => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'creationDate'                  => array( self::TYPE => self::TYPEDATE     , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'modificationDate'              => array( self::TYPE => self::TYPEDATE     , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'maxUsers'                      => array( self::TYPE => self::TYPEINTEGER  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'persistent'                    => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'publicRoom'                    => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'registrationEnabled'           => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'canAnyoneDiscoverJID'          => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'canOccupantsChangeSubject'     => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'canOccupantsInvite'            => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'canChangeNickname'             => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'logEnabled'                    => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'loginRestrictedToNickname'     => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'membersOnly'                   => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'moderated'                     => array( self::TYPE => self::TYPEBOOLEAN  , self::ISREQUIRED => false  , self::ISARRAY => false     )   ,
        'broadcastPresenceRoles'        => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'broadcastPresenceRole'   )   ,
        'owners'                        => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'owner'                   )   ,
        'admins'                        => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'admin'                   )   ,
        'members'                       => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'member'                  )   ,
        'outcasts'                      => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'outcast'                 )   ,
        'ownerGroups'                   => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'ownerGroup'              )   ,
        'adminGroups'                   => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'adminGroup'              )   ,
        'memberGroups'                  => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'memberGroup'             )   ,
        'outcastGroups'                 => array( self::TYPE => self::TYPESTRING   , self::ISREQUIRED => false  , self::ISARRAY => true    , self::ARRAYELEMNAME => 'outcastGroup'            )   ,
    );
}