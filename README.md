#Banckle.Helpdesk for Laravel

This is a Laravel Package to use Banckle.Helpdesk SDK for PHP in Laravel applications quickly and easily. 


Installation
----------------------------------

Add the following lines to your composer.json file.

<pre>
require: {
	"banckle/helpdesk-sdk-php": "dev-master",		
	"banckle/helpdesk-laravel": "dev-master"
}
</pre>


Run from terminal.

<pre>
composer update
</pre>


Add package to the list of providers. In config/app.php, add the following line to the providers array.
<pre>
'Banckle\Helpdesk\HelpdeskServiceProvider',
</pre>

Publish config files from the terminal.
<pre>
php artisan config:publish banckle/helpdesk-laravel
</pre>

Edit the new config file in the config/packages/banckle/helpdesk-laravel and enter your Banckle API Key, email & password.
<pre>
return array(
    'banckleAccountUri' => 'https://apps.banckle.com/api/v2',
    'banckleHelpdeskUri' => 'https://helpdesk.banckle.com/public/api/v1',    
    'apiKey' => '',
    'email' => '',
    'password' => ''
);
</pre>

In config/packages/banckle, rename helpdesk-laravel to helpdesk

Usage
----------------------------------

Anywhere in your application when you need to access class, just do:
<pre>
// To Generate token
BanckleHelpdesk::getToken();

BanckleHelpdesk::get($apiName, $token);
</pre>

This will return you object of class and you can access properties and methods of class.