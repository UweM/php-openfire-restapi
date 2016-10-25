php-openfire-restapi
=====================

A simple PHP class designed to work with Openfire Rest Api plugin. It is used to remote manage the Openfire server.
Originally forked from gidkom/php-openfire-restapi.

## LICENSE
php-openfire-restapi is licensed under MIT style license, see LICENCE for further information.

## REQUIREMENTS
- PHP 5.4+

## INSTALLATION

### With Composer
-------------
The easiest way to install is via [composer](http://getcomposer.org/). Create the following `composer.json` file and run the `composer.phar` install command to install it.

```json
{
    "require": {
        "maniaplanet/php-openfire-restapi": "v1.x"
    }
}
```

## USAGE
```php
include "vendor/autoload.php";

// Create the Openfire Rest api object
$api = new Maniaplanet\OpenFireRestApi\OpenFireRestApi;

// Set the required config parameters
$api->secret = "MySecret";
$api->host = "jabber.myserver.com";
$api->port = "9090";  // default 9090

// Optional parameters (showing default values)

$api->useSSL = false;
$api->plugin = "/plugins/restapi/v1";  // plugin 

// Add a new user to OpenFire and add to a group
$newUser = new Maniaplanet\OpenFireRestApi\Entity\;
$newUser->username  = 'Username';
$newUser->password  = 'Password';
$newUser->name      = 'Real Name';
$newUser->email     = 'johndoe@domain.com';
$newUser->groups    =  array('Group 1');

$result = $api->createUser($newUser);

// Check result if command is succesful
if($result['status']) {
    echo 'Success: ';
} else {
    // Something went wrong, probably connection issues
    echo 'Error: ';
    echo $result['error'];
}
```
