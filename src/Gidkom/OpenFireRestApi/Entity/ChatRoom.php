<?php
    
namespace Gidkom\OpenFireRestApi\Entity;

class ChatRoom implements \JsonSerializable
{
    private $roomName                        = ''; 
    private $naturalName                     = ''; 
    private $description                     = ''; 
    private $password                        = NULL; 
    private $subject                         = NULL; 
    private $creationDate                    = NULL;
    private $modificationDate                = NULL; 
    private $maxUsers                        = NULL; 
    private $persistent                      = NULL; 
    private $publicRoom                      = NULL; 
    private $registrationEnabled             = NULL; 
    private $canAnyoneDiscoverJID            = NULL;
    private $canOccupantsChangeSubject       = NULL; 
    private $canOccupantsInvite              = NULL; 
    private $canChangeNickname               = NULL; 
    private $logEnabled                      = NULL;
    private $loginRestrictedToNickname       = NULL; 
    private $membersOnly                     = NULL; 
    private $moderated                       = NULL; 
    private $broadcastPresenceRoles          = NULL; 
    private $owners                          = NULL; 
    private $admins                          = NULL;
    private $members                         = NULL; 
    private $outcasts                        = NULL;
    private $ownerGroups                     = NULL; 
    private $adminGroups                     = NULL;
    private $memberGroups                    = NULL; 
    private $outcastGroups                   = NULL;
    
    public function getRoomName                  () { return $this->roomName                   ; }
    public function getNaturalName               () { return $this->naturalName                ; }
    public function getDescription               () { return $this->description                ; }
    public function getPassword                  () { return $this->password                   ; }
    public function getSubject                   () { return $this->subject                    ; }
    public function getCreationDate              () { return $this->creationDate               ; }
    public function getModificationDate          () { return $this->modificationDate           ; }
    public function getMaxUsers                  () { return $this->maxUsers                   ; }
    public function getPersistent                () { return $this->persistent                 ; }
    public function getPublicRoom                () { return $this->publicRoom                 ; }
    public function getRegistrationEnabled       () { return $this->registrationEnabled        ; }
    public function getCanAnyoneDiscoverJID      () { return $this->canAnyoneDiscoverJID       ; }
    public function getCanOccupantsChangeSubject () { return $this->canOccupantsChangeSubject  ; }
    public function getCanOccupantsInvite        () { return $this->canOccupantsInvite         ; }
    public function getCanChangeNickname         () { return $this->canChangeNickname          ; }
    public function getLogEnabled                () { return $this->logEnabled                 ; }
    public function getLoginRestrictedToNickname () { return $this->loginRestrictedToNickname  ; }
    public function getMembersOnly               () { return $this->membersOnly                ; }
    public function getModerated                 () { return $this->moderated                  ; }
    public function getBroadcastPresenceRoles    () { return $this->broadcastPresenceRoles     ; }
    public function getOwners                    () { return $this->owners                     ; }
    public function getAdmins                    () { return $this->admins                     ; }
    public function getMembers                   () { return $this->members                    ; }
    public function getOutcasts                  () { return $this->outcasts                   ; }
    public function getOwnerGroups               () { return $this->ownerGroups                ; }
    public function getAdminGroups               () { return $this->adminGroups                ; }
    public function getMemberGroups              () { return $this->memberGroups               ; }
    public function getOutcastGroups             () { return $this->outcastGroups              ; }
        
    public function setRoomName                  ( $roomName                  ) { $this->roomName                  = $roomName                  ; }
    public function setNaturalName               ( $naturalName               ) { $this->naturalName               = $naturalName               ; }
    public function setDescription               ( $description               ) { $this->description               = $description               ; }
    public function setPassword                  ( $password                  ) { $this->password                  = $password                  ; }
    public function setSubject                   ( $subject                   ) { $this->subject                   = $subject                   ; }
    public function setCreationDate              ( $creationDate              ) { $this->creationDate              = $creationDate              ; }
    public function setModificationDate          ( $modificationDate          ) { $this->modificationDate          = $modificationDate          ; }
    public function setMaxUsers                  ( $maxUsers                  ) { $this->maxUsers                  = $maxUsers                  ; }
    public function setPersistent                ( $persistent                ) { $this->persistent                = $persistent                ; }
    public function setPublicRoom                ( $publicRoom                ) { $this->publicRoom                = $publicRoom                ; }
    public function setRegistrationEnabled       ( $registrationEnabled       ) { $this->registrationEnabled       = $registrationEnabled       ; }
    public function setCanAnyoneDiscoverJID      ( $canAnyoneDiscoverJID      ) { $this->canAnyoneDiscoverJID      = $canAnyoneDiscoverJID      ; }
    public function setCanOccupantsChangeSubject ( $canOccupantsChangeSubject ) { $this->canOccupantsChangeSubject = $canOccupantsChangeSubject ; }
    public function setCanOccupantsInvite        ( $canOccupantsInvite        ) { $this->canOccupantsInvite        = $canOccupantsInvite        ; }
    public function setCanChangeNickname         ( $canChangeNickname         ) { $this->canChangeNickname         = $canChangeNickname         ; }
    public function setLogEnabled                ( $logEnabled                ) { $this->logEnabled                = $logEnabled                ; }
    public function setLoginRestrictedToNickname ( $loginRestrictedToNickname ) { $this->loginRestrictedToNickname = $loginRestrictedToNickname ; }
    public function setMembersOnly               ( $membersOnly               ) { $this->membersOnly               = $membersOnly               ; }
    public function setModerated                 ( $moderated                 ) { $this->moderated                 = $moderated                 ; }
    public function setBroadcastPresenceRoles    ( $broadcastPresenceRoles    ) { $this->broadcastPresenceRoles    = $broadcastPresenceRoles    ; }
    public function setOwners                    ( $owners                    ) { $this->owners                    = $owners                    ; }
    public function setAdmins                    ( $admins                    ) { $this->admins                    = $admins                    ; }
    public function setMembers                   ( $members                   ) { $this->members                   = $members                   ; }
    public function setOutcasts                  ( $outcasts                  ) { $this->outcasts                  = $outcasts                  ; }
    public function setOwnerGroups               ( $ownerGroups               ) { $this->ownerGroups               = $ownerGroups               ; }
    public function setAdminGroups               ( $adminGroups               ) { $this->adminGroups               = $adminGroups               ; }
    public function setMemberGroups              ( $memberGroups              ) { $this->memberGroups              = $memberGroups              ; }
    public function setOutcastGroups             ( $outcastGroups             ) { $this->outcastGroups             = $outcastGroups             ; }
    
    public function jsonSerialize () {
        $Result = array(
            'roomName'     => $this->roomName    , 
            'naturalName'  => $this->naturalName , 
            'description'  => $this->description , 
        );
            
        if( $this->password                  !== NULL ) { $Result[ 'password'                  ] = $this->password                     ; }
        if( $this->subject                   !== NULL ) { $Result[ 'subject'                   ] = $this->subject                      ; }
        if( $this->creationDate              !== NULL ) { $Result[ 'creationDate'              ] = $this->creationDate                 ; }
        if( $this->modificationDate          !== NULL ) { $Result[ 'modificationDate'          ] = $this->modificationDate             ; }
        if( $this->maxUsers                  !== NULL ) { $Result[ 'maxUsers'                  ] = $this->maxUsers                     ; }
        if( $this->persistent                !== NULL ) { $Result[ 'persistent'                ] = $this->persistent                   ; }
        if( $this->publicRoom                !== NULL ) { $Result[ 'publicRoom'                ] = $this->publicRoom                   ; }
        if( $this->registrationEnabled       !== NULL ) { $Result[ 'registrationEnabled'       ] = $this->registrationEnabled          ; }
        if( $this->canAnyoneDiscoverJID      !== NULL ) { $Result[ 'canAnyoneDiscoverJID'      ] = $this->canAnyoneDiscoverJID         ; }
        if( $this->canOccupantsChangeSubject !== NULL ) { $Result[ 'canOccupantsChangeSubject' ] = $this->canOccupantsChangeSubject    ; }
        if( $this->canOccupantsInvite        !== NULL ) { $Result[ 'canOccupantsInvite'        ] = $this->canOccupantsInvite           ; }
        if( $this->canChangeNickname         !== NULL ) { $Result[ 'canChangeNickname'         ] = $this->canChangeNickname            ; }
        if( $this->logEnabled                !== NULL ) { $Result[ 'logEnabled'                ] = $this->logEnabled                   ; }
        if( $this->loginRestrictedToNickname !== NULL ) { $Result[ 'loginRestrictedToNickname' ] = $this->loginRestrictedToNickname    ; }
        if( $this->membersOnly               !== NULL ) { $Result[ 'membersOnly'               ] = $this->membersOnly                  ; }
        if( $this->moderated                 !== NULL ) { $Result[ 'moderated'                 ] = $this->moderated                    ; }

        if( $this->broadcastPresenceRoles    !== NULL ) { $Result[ 'broadcastPresenceRoles'    ] = array( 'broadcastPresenceRole' => $this->broadcastPresenceRoles ); }

        if( $this->owners                    !== NULL ) { $Result[ 'owners'                    ] = array( 'owner'                 => $this->owners                 ); }
        if( $this->admins                    !== NULL ) { $Result[ 'admins'                    ] = array( 'admin'                 => $this->admins                 ); }
        if( $this->members                   !== NULL ) { $Result[ 'members'                   ] = array( 'member'                => $this->members                ); }
        if( $this->outcasts                  !== NULL ) { $Result[ 'outcasts'                  ] = array( 'outcast'               => $this->outcasts               ); }
                
        if( $this->ownerGroups               !== NULL ) { $Result[ 'ownerGroups'               ] = array( 'ownerGroup'            => $this->ownerGroups            ); }
        if( $this->adminGroups               !== NULL ) { $Result[ 'adminGroups'               ] = array( 'adminGroup'            => $this->adminGroups            ); }
        if( $this->memberGroups              !== NULL ) { $Result[ 'memberGroups'              ] = array( 'memberGroup'           => $this->memberGroups           ); }
        if( $this->outcastGroups             !== NULL ) { $Result[ 'outcastGroups'             ] = array( 'outcastGroup'          => $this->outcastGroups          ); }
        
        return $Result;
    }
    
    public function jsonDeserialize ( $array ) {
        $this->roomName                    = $array['roomName'];
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
        
        $this->broadcastPresenceRoles = array();
        $broadcastPresenceRoles = $array['broadcastPresenceRoles'];
        if( $broadcastPresenceRoles ) {
            $broadcastPresenceRole = $broadcastPresenceRoles['broadcastPresenceRole'];
                 if ( is_array(  $broadcastPresenceRole ) ) { $this->broadcastPresenceRoles = $broadcastPresenceRole;        } 
            else if ( is_string( $broadcastPresenceRole ) ) { $this->broadcastPresenceRoles = array($broadcastPresenceRole); }
        }
        
        $this->owners = array();
        $owners = $array['owners'];
        if( $owners ) {
            $owner = $owners['owner'];
                 if ( is_array(  $owner ) ) { $this->owners = $owner;        } 
            else if ( is_string( $owner ) ) { $this->owners = array($owner); }
        }
        
        $this->admins = array();
        $admins = $array['admins'];
        if( $admins ) {
            $admin = $admins['admin'];
                 if ( is_array(  $admin ) ) { $this->admins = $admin;        } 
            else if ( is_string( $admin ) ) { $this->admins = array($admin); }
        }
        
        $this->members = array();
        $members = $array['members'];
        if( $members ) {
            $member = $members['member'];
                 if ( is_array(  $member ) ) { $this->members = $member;        } 
            else if ( is_string( $member ) ) { $this->members = array($member); }
        }
        
        $this->outcasts = array();
        $outcasts = $array['outcasts'];
        if( $outcasts ) {
            $outcast = $outcasts['outcast'];
                 if ( is_array(  $outcast ) ) { $this->outcasts = $outcast;        } 
            else if ( is_string( $outcast ) ) { $this->outcasts = array($outcast); }
        }
        
        
        $this->ownerGroups = array();
        $ownerGroups = $array['ownerGroups'];
        if( $ownerGroups ) {
            $ownerGroup = $ownerGroups['ownerGroup'];
                 if ( is_array(  $ownerGroup ) ) { $this->ownerGroups = $ownerGroup;        } 
            else if ( is_string( $ownerGroup ) ) { $this->ownerGroups = array($ownerGroup); }
        }
        
        $this->adminGroups = array();
        $adminGroups = $array['adminGroups'];
        if( $adminGroups ) {
            $adminGroup = $adminGroups['adminGroup'];
                 if ( is_array(  $adminGroup ) ) { $this->adminGroups = $adminGroup;        } 
            else if ( is_string( $adminGroup ) ) { $this->adminGroups = array($adminGroup); }
        }
        
        $this->memberGroups = array();
        $memberGroups = $array['membersGroup'];
        if( $memberGroups ) {
            $memberGroup = $memberGroups['memberGroup'];
                 if ( is_array(  $memberGroup ) ) { $this->memberGroups = $memberGroup;        } 
            else if ( is_string( $memberGroup ) ) { $this->memberGroups = array($memberGroup); }
        }
        
        $this->outcastGroups = array();
        $outcastGroups = $array['outcastGroups'];
        if( $outcastGroups ) {
            $outcastGroup = $outcastGroups['outcastGroup'];
                 if ( is_array(  $outcastGroup ) ) { $this->outcastGroups = $outcastGroup;        } 
            else if ( is_string( $outcastGroup ) ) { $this->outcastGroups = array($outcastGroup); }
        }
        
        
    }
}