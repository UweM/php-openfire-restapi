<?php
	
namespace Gidkom\OpenFireRestApi;

use GuzzleHttp\Client;
use Gidkom\OpenFireRestApi\Entity\ChatRoom;
use Gidkom\OpenFireRestApi\Entity\ChatRoomParticipant;
use Gidkom\OpenFireRestApi\Entity\Group;
use Gidkom\OpenFireRestApi\Entity\Roster;
use Gidkom\OpenFireRestApi\Entity\RosterItem;
use Gidkom\OpenFireRestApi\Entity\Session;
use Gidkom\OpenFireRestApi\Entity\User;

class OpenFireRestApi
{
    public $host		= 'localhost';
	public $port		= '9090';
	public $plugin		= '/plugins/restapi/v1';
	public $secret		= 'SuperSecret';
	public $useSSL		= false;
    protected $params   = array();
    public $client;

    /**
     * Class Contructor
     *
     */
    public function __construct()
    {
        $this->client = new Client();
       
    }

    /**
     * Make the request and analyze the result
     *
     * @param   string          $type           Request method
     * @param   string          $endpoint       Api request endpoint
     * @param   string          $resultType     Type of the expected result objects
     * @param   array           $params         Parameters
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    
    private function doRequest($type, $endpoint, $resultType = '', $resultIsArray = TRUE, $params=array())
    {
    	$base = ($this->useSSL) ? "https" : "http";
    	$url = $base . "://" . $this->host . ":" .$this->port.$this->plugin.$endpoint;
    	$headers = array(
  			'Accept' => 'application/json',
  			'Authorization' => $this->secret
  		);

        $body = json_encode($params);
		
        switch ($type) {
            case 'get':
                $result = $this->client->get($url, compact('headers'));
                break;
            case 'post':
                $headers += ['Content-Type'=>'application/json'];
                $result = $this->client->post($url, compact('headers','body'));
                break;
            case 'delete':
                $headers += ['Content-Type'=>'application/json'];
                $result = $this->client->delete($url, compact('headers','body'));
                break;
            case 'put':
                $headers += ['Content-Type'=>'application/json'];
                $result = $this->client->put($url, compact('headers','body'));
                break;
            default:
                $result = null;
                break;
        }
        
        if ($result->getStatusCode() == 200 || $result->getStatusCode() == 201) {
			
			if($resultType) {
				$result_array = json_decode($result->getBody(), TRUE);
				$result_objects = array();
				if($resultIsArray) {
					foreach($result_array as $item) {
						$newobject = new $resultType();
						$newobject->jsonDeserialize($item);
						$result_objects[] = $newobject;
					}
				} else {
					$newobject = new $resultType();
					$newobject->jsonDeserialize($result_array);
					$result_objects[] = $newobject;
				}
				return array('status'=>true, 'result'=>$result_objects, 'error'=>null);
			} else {
				return array('status'=>true, 'result'=>json_decode($result->getBody()), 'error'=>null);
			}
        }
        return array('status'=>false, 'result'=>null, 'error'=>json_decode($result->getBody()));
    }
	
    /**
     * Get a list of registered users
	 *
     * @return array                 Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function getUsers()
    {
    	$endpoint = '/users';        
    	return $this->doRequest('get',$endpoint, User::class, TRUE);
    }

    /**
     * Get information for a specified user
     *
     * @return array       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function getUser($username)
    {
        $endpoint = '/users/'.$username; 
        return $this->doRequest('get', $endpoint, User::class, FALSE);
    }


    /**
     * Creates a new OpenFire user
     *
     * @param   User            $user       User to add
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function createUser(User $user)
    {
        $endpoint = '/users/' . $user->username; 
        return $this->doRequest('post', $endpoint, '', FALSE, $user );
    }

	/**
	 * Update user.
	 *
     * @param   User            $user       User to update
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
	 */
	public function updateUser(User $user) {
        $endpoint = '/users/' . $user->username; 
        return $this->doRequest('put', $endpoint, '', FALSE, $user );
	}

    /**
     * Deletes an OpenFire user
     *
     * @param   string          $username   Username
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function deleteUser($username)
    {
        $endpoint = '/users/'.$username; 
        return $this->doRequest('delete', $endpoint);
    }
	
	/**
	 * Gets chat rooms.
	 *
     * @return  array                        Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
	 */
	public function getChatRooms( $servicename = 'conference') {
        $endpoint = '/chatrooms'; 
        return $this->doRequest('get', $endpoint, ChatRoom::class, TRUE, array('servicename' => $servicename));
	}

	/**
	 * Gets the chat room.
	 *
	 * @param   string     $roomName        the room name
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
	 */
	public function getChatRoom($chatroomName, $servicename = 'conference') {
        $endpoint = '/chatrooms/'.$roomName; 
        return $this->doRequest('get', $endpoint, ChatRoom::class, FALSE, NULL, array('servicename' => $servicename));
	}

	/**
	 * Creates the chat room.
	 *
	 * @param   ChatRoom     $chatroom      the room 
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
	 */
	public function createChatRoom(ChatRoom $chatroom, $servicename = 'conference') {
        $endpoint = '/chatrooms/'.$chatroom->roomName; 
        return $this->doRequest('post', $endpoint, '', FALSE, $chatroom, array('servicename' => $servicename) );
	}

	/**
	 * Update chat room.
	 *
	 * @param   ChatRoom     $chatroom      the room
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
	 */
	public function updateChatRoom(ChatRoom $chatroom, $servicename = 'conference') {
        $endpoint = '/chatrooms/'.$chatroom->roomName; 
        return $this->doRequest('put', $endpoint, '', FALSE, $chatroom, array('servicename' => $servicename) );
	}

	/**
	 * Delete chat room.
	 *
	 * @param   string     $roomName        the room name
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
	 */
	public function deleteChatRoom($roomName, $servicename = 'conference') {
        $endpoint = '/chatrooms/'.$roomName; 
        return $this->doRequest('delete', $endpoint, FALSE, $chatroom, array('servicename' => $servicename) );
	}


    /**
     * Get groups
     *
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function getGroups()
    {
        $endpoint = '/groups';
        return $this->doRequest('get', $endpoint, Group::class, TRUE);
    }

    /**
     *  Retrieve a group
     *
     * @param  string   $name                       Name of group
     * @return array                                Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function getGroup($name)
    {
        $endpoint = '/groups/'.$name;
        return $this->doRequest('get', $endpoint, Group::class, FALSE );
    }

    /**
     * Create a group 
     *
     * @param   string   $group                     Group to be created
     *
     * @return  array                               Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function createGroup( Group $group )
    {
        $endpoint = '/groups/';
        return $this->doRequest('post', $endpoint, '', FALSE, $group);
    }

    /**
     * Update a group (description)
     *
     * @param   string      $name               Name of group
     * @param   string      $description        Some description of the group
     * @return array                            Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function updateGroup( Group $group )
    {
        $endpoint = '/groups/'.$group->name;
        return $this->doRequest('put', $endpoint, '', FALSE, $group);
    }

    /**
     * Delete a group
     *
     * @param   string      $name               Name of the Group to delete
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function deleteGroup($name)
    {
        $endpoint = '/groups/'.$name;
        return $this->doRequest('delete', $endpoint);
    }

    /**
     * Adds user to this group
     *
     * @param   string          $username       Username
     * @param   string          $groupname      Groupname
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function addToGroup($username, $groupname, $isAdmin)
    {
        $endpoint = '/users/'.$username.'/groups/'.$groupname;
        return $this->doRequest('post', $endpoint);
    }
	
    /**
     * Removes user from this group
     *
     * @param   string          $username       Username
     * @param   string          $groupname      Groupname
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function deleteFromGroup($username, $groupname)
    {
        $endpoint = '/users/'.$username.'/groups/'.$groupname;
        return $this->doRequest('delete', $endpoint);
    }
	
    /**
     * Add group with role to chat room
     *
     * @param   string          $groupname      Groupname
     * @param   string          $role           The role. For now, can be : owners admins members outcasts
     * @param   string          $roomname       roomname
     * @param   string          $servicename    servicename
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function addGroupToChatRoomRole($groupname, $role, $roomname, $servicename = 'conference')
    {
        $endpoint = '/chatrooms/'.$roomname.'/'.$role.'/group/'.$groupname;
        return $this->doRequest('post', $endpoint, '', FALSE, array('servicename' => $servicename) );
    }
	
    /**
     * Remove group with role to chat room
     *
     * @param   string          $groupname      Groupname
     * @param   string          $role           The role. For now, can be : owners admins members outcasts
     * @param   string          $roomname       roomname
     * @param   string          $servicename    servicename
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function removeGroupFromChatRoomRole($groupname, $role, $roomname, $servicename = 'conference')
    {
        $endpoint = '/chatrooms/'.$roomname.'/'.$role.'/group/'.$groupname;
        return $this->doRequest('delete', $endpoint, '', FALSE, array('servicename' => $servicename) );
    }
	
    /**
     * Adds to this OpenFire user's roster
     *
     * @param   string          $username       Username
     * @param   string          $jid            JID
     * @param   string|false    $name           Name         (Optional)
     * @param   int|false       $subscription   Subscription (Optional)
     * @return  array                           Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function addToRoster($username, $jid, $name=false, $subscription=false)
    {
        $endpoint = '/users/'.$username.'/roster';
        return $this->doRequest('post', $endpoint, compact('jid','name','subscription'));
    }


    /**
     * Removes from this OpenFire user's roster
     *
     * @param   string          $username   Username
     * @param   string          $jid        JID
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function deleteFromRoster($username, $jid)
    {
        $endpoint = '/users/'.$username.'/roster/'.$jid;
        return $this->doRequest('delete', $endpoint, $jid);
    }

    /**
     * Updates this OpenFire user's roster
     *
     * @param   string          $username           Username
     * @param   string          $jid                JID
     * @param   string|false    $nickname           Nick Name (Optional)
     * @param   int|false       $subscriptionType   Subscription (Optional)
     * @return  array                               Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function updateRoster($username, $jid, $nickname=false, $subscriptionType=false)
    {
        $endpoint = '/users/'.$username.'/roster/'.$jid;
        return $this->doRequest('put', $endpoint, $jid, compact('jid','username','subscriptionType'));     
    }
    /**
     * Gell all active sessions
     *
     * @return array                            Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function getSessions()
    {
        $endpoint = '/sessions';
        return $this->doRequest('get', $endpoint);
    }
	
     /**
     * locks/Disables an OpenFire user
     *
     * @param   string          $username   Username
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function lockoutUser($username)
    {
        $endpoint = '/lockouts/'.$username; 
        return $this->doRequest('post', $endpoint);
    }


    /**
     * unlocks an OpenFire user
     *
     * @param   string          $username   Username
     * @return  array                       Array containing 'status' (true on success) and 'result' the answers as an array of objects and 'error' the error as an array
     */
    public function unlockUser($username)
    {
        $endpoint = '/lockouts/'.$username; 
        return $this->doRequest('delete', $endpoint);
    }


}
