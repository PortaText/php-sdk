PortaText\Command\Api\Me
===============

The Me endpoint.




* Class name: Me
* Namespace: PortaText\Command\Api
* Parent class: [PortaText\Command\Base](PortaText-Command-Base.md)





Properties
----------


### $args

    private array $args

Arguments for endpoint invokation.



* Visibility: **private**


Methods
-------


### firstname

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Me::firstname(string $firstname)

Set firstname.



* Visibility: **public**


#### Arguments
* $firstname **string** - &lt;p&gt;The firstname.&lt;/p&gt;



### lastname

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Me::lastname(string $lastname)

Set lastname.



* Visibility: **public**


#### Arguments
* $lastname **string** - &lt;p&gt;The lastname.&lt;/p&gt;



### company

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Me::company(string $company)

Set company.



* Visibility: **public**


#### Arguments
* $company **string** - &lt;p&gt;The company.&lt;/p&gt;



### email

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Me::email(\PortaText\Command\Api\email $email)

Set email.



* Visibility: **public**


#### Arguments
* $email **PortaText\Command\Api\email** - &lt;p&gt;The email.&lt;/p&gt;



### callbackUrl

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Me::callbackUrl(string $callbackUrl)

Set the callback url.



* Visibility: **public**


#### Arguments
* $callbackUrl **string** - &lt;p&gt;The callback url.&lt;/p&gt;



### timezone

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Me::timezone(string $timezone)

Set timezone.



* Visibility: **public**


#### Arguments
* $timezone **string** - &lt;p&gt;The timezone.&lt;/p&gt;



### endpoint

    string PortaText\Command\ICommand::endpoint(string $method)

Returns a string with the endpoint for the given command.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### setArgument

    array PortaText\Command\Base::setArgument(string $key, string $value)

Returns an associative array with the arguments.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;
* $value **string** - &lt;p&gt;Value of the argument.&lt;/p&gt;



### delArgument

    array PortaText\Command\Base::delArgument(string $key)

Deleted an argument.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;



### getArgument

    mixed|null PortaText\Command\Base::getArgument(string $key)

Returns the value for the given argument name.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;



### arguments

    array PortaText\Command\ICommand::arguments(string $method)

Returns an associative array with the arguments.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### body

    string PortaText\Command\ICommand::body(string $method)

Returns the body for this endpoint.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### contentType

    string PortaText\Command\ICommand::contentType(string $method)

Returns the content type for this endpoint.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### get

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::get()

Runs this command with a GET method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### post

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::post()

Runs this command with a POST method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### put

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::put()

Runs this command with a PUT method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### delete

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::delete()

Runs this command with a DELETE method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### patch

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::patch()

Runs this command with a PATCH method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### run

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\Base::run(string $method)

Runs this command with the given method and returns the result.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;HTTP Method to use.&lt;/p&gt;



### setClient

    \PortaText\Command\PortaText\Api\Api PortaText\Command\ICommand::setClient(\PortaText\Command\PortaText\Client\Client $client)

Sets the API client to use.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $client **PortaText\Command\PortaText\Client\Client** - &lt;p&gt;New injected client.&lt;/p&gt;



### __construct

    mixed PortaText\Command\Base::__construct()

Standard constructor.



* Visibility: **public**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)



