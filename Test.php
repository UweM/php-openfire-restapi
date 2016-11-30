<?php
    
    
// Simple test suite

use Maniaplanet\OpenFireRestApi\OpenFireRestApi;
use Maniaplanet\OpenFireRestApi\Entity\ChatRoom;
    
print "php-openfire-restapi test suite\n";

define( 'PATH',	realpath( dirname(__FILE__)) );

require_once( PATH.'/vendor/autoload.php' );

require_once( PATH.'/Test_options.php' );

$api = new OpenFireRestApi;
$api->secret = SERVER_SECRET;
$api->host   = SERVER_HOST;
$api->port   = SERVER_PORT;

$newRoom = new ChatRoom;
$newRoom->roomName =  'roomtest3';
$newRoom->naturalName =  'RoomTest3';
$newRoom->description =  'Description test 3';
$newRoom->members =  array();
$result = $api->createChatRoom($newRoom, 'conference');
print_r( $result );

$result = $api->getChatRoom('roomtest3', 'conference');
$obj = $result['result'][0];
$str = json_encode( $obj );
print_r( $str."\n" );

$result = $api->deleteChatRoom('roomtest3', 'conference');
print_r( $result );

$result = $api->getChatRoom('roomtest3', 'conference');
$obj = $result['result'][0];
$str = json_encode( $obj );
print_r( $str."\n" );


function createUser(OpenFireRestApi $api, $name) {

    $newUser = new \Maniaplanet\OpenFireRestApi\Entity\User;
    $newUser->username  = $name;
    $newUser->password  = 'apitestpass';
    $newUser->name      = 'apitestuser';
    $newUser->email     = 'apitestuser@example.com';

    print_r($api->createUser($newUser));

}
$u1 = 'apitestuser1';
$u2 = 'apitestuser2';
createUser($api, $u1);
createUser($api, $u2);

print_r($api->getUser($u1)['result'][0]);


print_r($api->addToRoster($u1, $u2.'@'.SERVER_HOST, $u2));
print_r($api->deleteFromRoster($u1, $u2.'@'.SERVER_HOST));



print_r($api->deleteUser($u1));
print_r($api->deleteUser($u2));



